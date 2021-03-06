<?php
/**
 * Hooks.
 */

/**
 * Allow upload json file
 */
add_filter( 'upload_mimes', function ( $mime_types ) {
	$mime_types['json'] = 'application/json'; // Adding .json extension

	return $mime_types;
}, 1 );

/**
 * Header template
 * @return void
 */
add_action( 'flip_base_hook_header', 'flip_base_header_template' );
function flip_base_header_template() {
	load_template( get_template_directory() . '/template-parts/header.php', false );
}

/**
 * Footer template
 * @return void
 */
add_action( 'flip_base_hook_footer', 'flip_base_footer_template' );
function flip_base_footer_template() {
	load_template( get_template_directory() . '/template-parts/footer.php', false );
}

/**
 * Post loop item template
 *
 * @param Int $post_id
 *
 * @return void
 */
add_action( 'flip_base_hook_post_loop_item', 'flip_base_post_loop_item_template', 20, 2 );
function flip_base_post_loop_item_template( $post_id, $index ) {
	set_query_var( 'post_id', $post_id );
	$v  = ( $index ) % 3;
	$vT = ceil( $v );

	$anm = 'data-aos="fade-up" data-aos-duration="' . ( ( $v !== 0 ? $vT : 3 ) * 400 ) . '"';
	?>
    <article <?= $anm; ?> <?php post_class( 'item post-loop-item col-md-4' ) ?>>
        <?php flip_base_post_item() ?>
    </article>
	<?php
}

add_action( 'rest_api_init', 'flip_base_create_ACF_meta_in_REST' );
function flip_base_create_ACF_meta_in_REST() {
	$post_types_to_exclude       = [ 'acf-field-group', 'acf-field' ];
	$extra_post_types_to_include = [ "page", 'post' ];
	$post_types                  = array_diff( get_post_types( [ "_builtin" => false ], 'names' ), $post_types_to_exclude );
	array_push( $post_types, $extra_post_types_to_include );

	foreach ( $post_types as $post_type ) {
		register_rest_field( $post_type, 'acf', [
			'get_callback' => function ( $object ) {
				$ID = $object['id'];

				return __get_fields( $ID );
			},
			'schema'       => null,
		] );
	}
	register_rest_field( 'winners-and-finalists', 'acf', [
		'get_callback' => function ( $object ) {
			$ID = $object['id'];

			return __get_fields( 'term_' . $ID );
		},
		'schema'       => null,
	] );
}
