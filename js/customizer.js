/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

// Badge Text refresh
    wp.customize( 'hero_badge_text', function( value ) {
        value.bind( function( to ) {
            $( '.hero-badge-ref' ).text( to );
        } );
    } );

    // Main Title refresh
    wp.customize( 'hero_main_title', function( value ) {
        value.bind( function( to ) {
            $( '.hero-title-ref' ).html( to ); // Use .html because we might allow <br>
        } );
    } );

    // Description refresh
    wp.customize( 'hero_desc', function( value ) {
        value.bind( function( to ) {
            $( '.hero-desc-ref' ).text( to );
        } );
    } );

    // CTA Button refresh
    wp.customize( 'hero_cta_text', function( value ) {
        value.bind( function( to ) {
            $( '.hero-cta-ref' ).text( to );
        } );
    } );

	// Card 2
    wp.customize( 'hero_card_2_title', v => v.bind( to => $( '.hero-card2-title-ref' ).text( to ) ) );
    wp.customize( 'hero_card_2_desc', v => v.bind( to => $( '.hero-card2-desc-ref' ).text( to ) ) );

    // Card 3
    wp.customize( 'hero_card_3_title', v => v.bind( to => $( '.hero-card3-title-ref' ).text( to ) ) );
    wp.customize( 'hero_card_3_list_1', v => v.bind( to => $( '.hero-card3-list-1-ref' ).text( to ) ) );
    wp.customize( 'hero_card_3_list_2', v => v.bind( to => $( '.hero-card3-list-2-ref' ).text( to ) ) );
    wp.customize( 'hero_card_3_list_3', v => v.bind( to => $( '.hero-card3-list-3-ref' ).text( to ) ) );

    // Card 4
    wp.customize( 'hero_card_4_desc', v => v.bind( to => $( '.hero-card4-desc-ref' ).text( to ) ) );

	// Headlines
    wp.customize( 'res_divider_text', v => v.bind( to => $( '.res-divider-ref' ).text( to ) ) );
    wp.customize( 'res_headline_old', v => v.bind( to => $( '.res-old-ref' ).text( to ) ) );
    wp.customize( 'res_headline_new', v => v.bind( to => $( '.res-new-ref' ).html( to ) ) );

    // Loop through cards
    for ( let i = 1; i <= 4; i++ ) {
        wp.customize( `res_card_${i}_val`, v => v.bind( to => $( `.res-card-${i}-val` ).text( to ) ) );
        wp.customize( `res_card_${i}_txt`, v => v.bind( to => $( `.res-card-${i}-txt` ).text( to ) ) );
    }

    // CTA
    wp.customize( 'res_cta_text', v => v.bind( to => $( '.res-cta-ref' ).text( to ) ) );




	// Top Level
    wp.customize( 'ben_divider_text', v => v.bind( to => $( '.ben-div-ref' ).text( to ) ) );
    wp.customize( 'ben_main_title', v => v.bind( to => $( '.ben-title-ref' ).text( to ) ) );
    wp.customize( 'ben_desc', v => v.bind( to => $( '.ben-desc-ref' ).text( to ) ) );

    // Card Loops
    for ( let i = 1; i <= 5; i++ ) {
        wp.customize( `ben_card_${i}_title`, v => v.bind( to => $( `.ben-c${i}-t` ).text( to ) ) );
        wp.customize( `ben_card_${i}_desc`, v => v.bind( to => $( `.ben-c${i}-d` ).text( to ) ) );
    }

	// Basic Text
    wp.customize( 'func_badge', v => v.bind( to => $( '.func-badge-ref' ).text( to ) ) );
    wp.customize( 'func_title', v => v.bind( to => $( '.func-title-ref' ).text( to ) ) );
    wp.customize( 'func_desc', v => v.bind( to => $( '.func-desc-ref' ).text( to ) ) );
    wp.customize( 'func_bottom_badge', v => v.bind( to => $( '.func-bottom-badge-ref' ).text( to ) ) );

}( jQuery ) );
