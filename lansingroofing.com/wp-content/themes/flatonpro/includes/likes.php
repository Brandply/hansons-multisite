<?php

add_action( 'wp_ajax_nopriv_link_click_counter', 'link_click_counter' );

function link_click_counter() {
    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'link_click_counter_' . $_POST['post_id'] ) ) {
        $count = get_post_meta( $_POST['post_id'], 'link_click_counter', true );
        update_post_meta( $_POST['post_id'], 'link_click_counter', ( $count === '' ? 1 : $count + 1 ) );
    } else {
    	update_post_meta( 1, 'not_found', true);
    }
    exit();
}


add_action( 'wp_head', 'link_click_head' );
function link_click_head() {
    global $post;

    if( isset( $post->ID ) ) {
?>
    <script type="text/javascript" >
    jQuery(function ($) {
        var ajax_options = {
            type: "POST",
            action: 'link_click_counter',
            nonce: '<?php echo wp_create_nonce( 'link_click_counter_' . $post->ID ); ?>',
            ajaxurl: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            post_id: '<?php echo $post->ID; ?>'
        };

        $( '.countable_link' ).on( 'click', function() {
            console.log("Clicked");
            var self = $( this );
            $.post( ajax_options.ajaxurl, ajax_options, function() {
                //window.location.href = self.attr( "href" );
                console.log(ajax_options.post_id);
            });
            return false;
        });
    });
    </script>
<?php
    }
}
?>