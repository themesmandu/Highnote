<?php
/**
 * Customizer default options
 *
 * @package Highnote
 * @return array An array of default values
 */

if ( ! function_exists( 'highnote_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function highnote_get_default_theme_options() {

		$defaults = array();

		$defaults['menu_bar_bgcolor']               = 'rgba(255,255,255,.07)';        //Main Menu Bar Background.
		$defaults['menu_bar_scroll_bgcolor']        = 'rgba(0,0,0,1)';        //Main Menu Bar Fixed Scroll Background.
		$defaults['menu_color']                     = 'rgba(255,255,255,1)';        //Main Menu Color.
		$defaults['menu_hover_color']               = 'rgba(243,202,122,1)';      //Main Menu Hover Color.
		$defaults['site_title_color']               = 'rgba(255,255,255,1)';      //Site Title Color.
		$defaults['title_color']                    = '#31396b';       //Entry/Post/Page Title Color
		$defaults['content_color']                  = '#3f3f45';       //Entry/Post/Page content Color
		$defaults['entry_bgcolor']                  = 'rgba(255,255,255,1)';     //Entry Card Background.
		$defaults['entry_footer_bgcolor']           = '#ffffff';      //Entry Card: Footer Background.
		$defaults['wgt_title_color']                = '#020407';       //Widget Title Color.
		$defaults['link_color']                     = 'rgba(247,99,27,0.7)';        //Text Link Color.
		$defaults['body_color']                     = '#212121';        //body color Color.
		$defaults['header_title_color']             = '#ffffff';        //header title color Color.
		$defaults['link_hover_color']               = '#0056b3';      //Text Link Hover Color.
		$defaults['meta_color']                     = '#777777';        //Meta Text Color.
		$defaults['beats_btn_color']                = 'rgba(251,58,102,1)';     //Beats Button Background Color.
		$defaults['beats_btn_hover_color']          = 'rgba(251,58,102,0.7)';      //Beats Button Background: Hover Color.
		$defaults['beats_btn_text_color']           = 'rgba(255, 255, 255, 1)';       //Beats Button Text Color.
		$defaults['beats_player_now_playing_bg']    = '#cb0000';       //Beats Highlight Color
		$defaults['beats_btn_text_hover_color']     = 'rgba(255, 255, 255, 1)';     //Beats Button Text: Hover Color.
		$defaults['footer_overlay']                 = 'rgba(0, 0, 0, 1)';      //Footer Background.
		$defaults['footer_color']                   = 'rgba(255, 255, 255, 1)';       //Footer Text Color.
		$defaults['beats_player_overlay']           = 'rgba(4,12,45,0.9)';       //Beats Playes Section Overlay
		$defaults['beats_player_download_toggle']   = '1';       //Beats Playes download toggle
		$defaults['beats_player_tag_column_toggle'] = '1';       //Beats Playes tags toggle
		$defaults['beats_player_bpm_column_toggle'] = '1';       //Beats Playes bpm toggle
		$defaults['about_overlay']                  = 'rgba(9,20,42,0.96)';       //About Section Overlay
		$defaults['pricing_table_overlay']          = '';       //pricing table Section Overlay
		$defaults['faqs_overlay']                   = '';       //faqs Section Overlay
		$defaults['contact_overlay']                = '';       //contact Section Overlay
		$defaults['testimonial_overlay']            = '#020711';       //Testimonial Section Overlay Overlay
		$defaults['testimonial_rows']               = '1';       //Testimonial Section Overlay Overlay
		$defaults['features_overlay']               = 'rgba(4,12,45,1)';       //Feature Section Overlay Overlay

		// Frontpage Sections Color Options

		$defaults['feature_highlight_color']        = '#fac170';       //Feature Highlight Color
		$defaults['licensing_border_color']         = '#fb3a66';       //Licensing Heightlight Border Color
		$defaults['licensing_highlight_bg_color']   = '#cb0000';     //Licensing Heightlight Background Color
		$defaults['licensing_highlight_text_color'] = '#ffffff';       //Licensing Heightlight Hover Color

		// Beats Playes Color Options

		$defaults['beats_player_bg']                                 = '#0e0e11';       //Beats Player Background Styles
		$defaults['beats_player_text_color']                         = '#a2accd';       //Beats Player Text Styles
		$defaults['beats_player_navbar_bg']                          = '#0e0e11';       //Beats Player Navbar Background Styles
		$defaults['beats_player_navbar_text_color']                  = '#a2accd';       //Beats Player Navbar text Styles
		$defaults['beats_player_navbar_btn_color']                   = '#a2accd';       //Beats Player Navbar button Styles
		$defaults['beats_player_navbar_btn_text_color']              = '#0e0e11';       //Beats Player Navbar button text Styles
		$defaults['beats_player_btn_assets']                         = '#cb0000';       //Beats Player Buttons Background Styles
		$defaults['beats_player_btn_text_color']                     = '#ffffff';       //Beats Player Buttons Color Styles
		$defaults['beats_player_btn_added']                          = '#2cb673';       //Beats Player added Buttons Background Styles
		$defaults['beats_player_btn_added_text_color']               = '#ffffff';       //Beats Player added Buttons text Background Styles
		$defaults['beats_player_now_playing']                        = '#c83637';       //Beats Player Nowplaying Background Styles
		$defaults['now_playing_text_color']                          = '#ffffff';       //Beats Player Nowplaying Background Styles
		$defaults['now_playing_btn_color']                           = '#0e0e11';       //Beats Player Nowplaying button Styles
		$defaults['now_playing_btn_text_color']                      = '#ffffff';       //Beats Player Nowplaying button text Styles
		$defaults['beats_player_shared_bg_color']                    = '#c6acad';       //Beats Player Shared Track Background Styles
		$defaults['beats_player_shared_text_color']                  = '#222222';       //Beats Player Shared Track Text Styles
		$defaults['beats_player_shared_btn_color']                   = '#0e0e11';       //Beats Player Shared Track button Styles
		$defaults['beats_player_shared_btn_text_color']              = '#c6acad';       //Beats Player Shared Track button text Styles
		$defaults['beats_player_shared_btn_text_color']              = '#ffffff';       //player Licensing area color
		$defaults['beats_player_licensing_area_color']               = '#393939';       //player Licensing area background color
		$defaults['beats_player_licensing_area_text_color']          = '#ffffff';       //player Licensing area text color
		$defaults['beats_player_licensing_area_selected_bg_color']   = '#cb0000';       //player Licensing area selected background color.
		$defaults['beats_player_licensing_area_selected_text_color'] = '#ffffff';       //player Licensing area selected text color.
		$defaults['footer_beats_player_bg']                          = '#0e0e11';       //footer player background color
		$defaults['footer_beats_player_text_color']                  = '#a2accd';       //Footer player text color
		$defaults['beats_player_control_slider_bg_color']            = 'rgba(207,207,207,.24)';       //player Buffering bar background color
		$defaults['beats_player_scrollbar_track_bg_color']           = '';       //player Scroll bar track background color
		$defaults['beats_player_scrollbar_thumb_bg_color']           = 'rgba(255, 255, 255, .2)';       //player Scroll bar thumb background color

		// FAQs Color Options

		$defaults['faqs_active_color'] = 'rgba(251,58,102,1)';       // player Licensing area selected text color.

		// Testimonial Options

		$defaults['testimonial_odd_color']             = 'rgba(0, 0, 0, 0)';       // player Licensing area selected text color.
		$defaults['testimonial_odd_bs_color']          = 'rgba(0, 0, 0, 0)';       // player Licensing area selected text color.
		$defaults['testimonial_even_color']            = 'rgba(0, 0, 0, 0)';       // player Licensing area selected text color.
		$defaults['testimonial_even_bs_color']         = 'rgba(0, 0, 0, 0)';       // player Licensing area selected text color.
		$defaults['testimonial_slide_autoplay_speed']  = 3;       // testinomial slide autoplay speed
		$defaults['testimonial_slide_speed']           = 5;       // testinomial slide autoplay speed
		$defaults['testimonial_slide_autoplay_toggle'] = true;       // testinomial slide autoplay speed

		//blog defaults

		$defaults['blog_sortable_content_sandard'] = array( 'title', 'thumbnail', 'meta', 'content' );   //blod content sortable defaults standard
		$defaults['blog_sortable_content_list']    = array( 'image', 'content-all' );   //blod content sortable defaults list
		$defaults['blog_sortable_content_list2']   = array( 'title', 'meta', 'content' );   //blod content sortable defaults list secontd

		//slider defaults

		$defaults['slider_animations'] = array( 'linear' );   //blod content sortable defaults list secontd
		$defaults['slide_duration']    = 2;   //slide duration.
		$defaults['slide_delay']       = 5;   //slide delay.
		$defaults['slide_autoplay']    = true;   //slide autoplay.
		$defaults['slide_pauseplay']   = true;   //slide playpause.
		$defaults['slide_hover']       = false;   //slide hover.
		$defaults['slide_loop']        = true;   //slide repeat.
		$defaults['slide_caption']     = true;   //slide caption.
		$defaults['slide_control']     = true;   //slide caption.
		$defaults['slide_bullet']      = true;   //slide caption.
		$defaults['slide_gesture']     = false;   //slide caption.

		// feature section show icon
		$defaults['feature_show_icon']        = true;   //slide caption.
		$defaults['feature_show_icon_tablet'] = true;   //slide caption.
		$defaults['feature_show_icon_mobile'] = true;   //slide caption.

		// Pass through filter.
		$defaults = apply_filters( 'highnote_get_default_theme_options', $defaults );
		return $defaults;
	}

endif;
