<?php

/*
 * a language object is made of two terms in 'language' and 'term_language' taxonomies
 * manipulating only one object per language instead of two terms should make things easier
 *
 * properties:
 * term_id             => id of term in 'language' taxonomy
 * name                => language name. Ex: English
 * slug                => language code used in url. Ex: en
 * term_group          => order of the language when displayed in a list of languages
 * term_taxonomy_id    => term taxonomy id in 'language' taxonomy
 * taxonomy            => 'language'
 * description         => language locale for backward compatibility
 * parent              => 0 / not used
 * count               => number of posts and pages in that language
 * tl_term_id          => id of the term in 'term_language' taxonomy
 * tl_term_taxonomy_id => term taxonomy id in 'term_language' taxonomy
 * tl_count            => number of terms in that language (not used by Polylang)
 * locale              => language locale. Ex: en_US
 * is_rtl              => 1 if the language is rtl
 * flag_url            => url of the flag
 * flag                => html img of the flag
 *
 * @since 1.2
 */
class PLL_Language {

	/*
	 * constructor: builds a language object given its two corresponding terms in language and term_language taxonomies
	 *
	 * @since 1.2
	 *
	 * @param object $language 'language' term
	 * @param object $term_language corresponding 'term_language' term
	 */
	public function __construct($language, $term_language) {
		foreach ($language as $prop => $value)
			$this->$prop = in_array($prop, array('term_id', 'term_taxonomy_id', 'count')) ? (int) $language->$prop : $language->$prop;

		// although it would be convenient here, don't assume the term is shared between taxonomies as it may not be the case in future
		// http://make.wordpress.org/core/2013/07/28/potential-roadmap-for-taxonomy-meta-and-post-relationships/
		$this->tl_term_id = (int) $term_language->term_id;
		$this->tl_term_taxonomy_id = (int) $term_language->term_taxonomy_id;
		$this->tl_count = (int) $term_language->count;

		$description = maybe_unserialize($language->description);
		$this->locale = $description['locale'];
		$this->is_rtl = $description['rtl'];

		$this->description = &$this->locale; // backward compatibility with Polylang < 1.2
	}

	/*
	 * sets flag_url and flag properties
	 *
	 * @since 1.2
	 */
	public function set_flag() {
		if (file_exists(POLYLANG_DIR.($file = '/flags/'.$this->locale.'.png')))
			$url = POLYLANG_URL.$file;

		// overwrite with custom flags
		// never use custom flags on admin side
		if (!PLL_ADMIN && ( file_exists(PLL_LOCAL_DIR.($file = '/'.$this->locale.'.png')) || file_exists(PLL_LOCAL_DIR.($file = '/'.$this->locale.'.jpg')) ))
			$url = PLL_LOCAL_URL.$file;

		$this->flag_url = empty($url) ? '' : esc_url($url);

		$this->flag = apply_filters('pll_get_flag', empty($this->flag_url) ? '' :
			sprintf(
				'<img src="%s" title="%s" alt="%s" />',
				esc_url($this->flag_url),
				esc_attr(apply_filters('pll_flag_title', $this->name, $this->slug, $this->locale)),
				esc_attr($this->name)
			));
	}

	/*
	 * updates post and term count
	 *
	 * @since 1.2
	 */
	public function update_count() {
		wp_update_term_count($this->term_taxonomy_id, 'language'); // posts count
		wp_update_term_count($this->tl_term_taxonomy_id, 'term_language'); // terms count
	}
}
