<?php

function git_status_admin_bar_menu( WP_Admin_Bar $wp_admin_bar ) {
	if ( !current_user_can( 'activate_plugins' ) )
		return;
	if ( !$status = git_status_get_status() )
		return;
	$wp_admin_bar->add_menu( array(
		'id'     => 'git-status',
		'title'  => sprintf( '(%s)%s', $status['branch'], $status['dirty'] ),
		'href'   => '#'
	) );
	$wp_admin_bar->add_menu( array(
		'parent' => 'git-status',
		'id'     => 'git-status-details',
		'title'  => ( implode('<br>', array_map( 'esc_html', $status['status'] ) ) ),
		'href'   => '#'
	) );
}
function git_status_get_status() {
	if ( !function_exists( 'exec' ) )
		return false;
	exec( sprintf( 'cd %s; git status', escapeshellarg( ABSPATH ) ), $status );
	if ( empty( $status ) or ( false !== strpos( $status[0], 'fatal' ) ) )
		return false;
	$end = end( $status );
	$return = array(
		'dirty'  => '*',
		'branch' => 'detached',
		'status' => $status,
	);
	if ( preg_match( '/On branch (.+)$/', $status[0], $matches ) )
		$return['branch'] = trim( $matches[1] );
	if ( empty( $end ) or ( false !== strpos( $end, 'nothing to commit' ) ) )
		$return['dirty'] = '';
	return $return;
}
function git_status_head() {
	?>
	<style type="text/css">
		#wp-admin-bar-git-status-details a {
			height: auto !important;
		}
	</style>
	<?php
}
add_action( 'admin_bar_menu', 'git_status_admin_bar_menu', 999 );
add_action( 'wp_head',        'git_status_head' );
add_action( 'admin_head',     'git_status_head' );