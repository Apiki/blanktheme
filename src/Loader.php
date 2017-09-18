<?php

namespace GB\Theme;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use GB\Theme\Helper\Utils;
use ReflectionClass;

abstract class Loader
{
	public function __construct()
	{
		add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		add_action( 'after_setup_theme', array( &$this, 'load_theme_textdomain' ) );
		add_action( 'after_switch_theme', array( &$this, 'after_switch_theme' ) );
		add_action( 'admin_bar_menu', array( &$this, 'add_ghost_menu' ), 999 );
		add_action( 'admin_head', array( &$this, 'ghost_icon' ) );
		add_action( 'wp_head', array( &$this, 'ghost_icon' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ) );
		add_filter( 'gform_confirmation_anchor', '__return_false' );

		$this->initialize();
	}

	public function initialize()
	{

	}

	public function after_setup_theme()
	{

	}

	public function after_switch_theme()
	{
		add_action( 'admin_init', array( &$this, 'install' ) );
	}

	public function install()
	{

	}

	public function enqueue_scripts()
	{

	}

	public function load_theme_textdomain()
	{
		load_theme_textdomain( static::SLUG, get_template_directory() . '/languages' );
	}

	public function define_content_width( $width )
	{
		global $content_width;

		if ( ! isset( $content_width ) ) {
			$content_width = $width;
		}
	}

	public function create_template_pages()
	{
		$templates = get_page_templates();

		foreach ( $templates as $page_name => $page_template ) {
			$page_id = Utils::maybe_create_page( $page_name );
			update_post_meta( $page_id, '_wp_page_template', $page_template );
		}
	}

	public function load_controllers( $controllers, $activate = false )
	{
		$namespace = $this->get_namespace();

		foreach ( $controllers as $name ) {
			$this->_handle_instance( sprintf( "{$namespace}\Controller\%s", $name ), $activate );
		}
	}

	public function get_namespace()
	{
		return ( new ReflectionClass( $this ) )->getNamespaceName();
	}

	public function add_ghost_menu( $wp_admin_bar )
	{
		$user         = wp_get_current_user();
		$is_localhost = ( isset( $_SERVER['SERVER_NAME'] ) && 'localhost' === $_SERVER['SERVER_NAME'] );

		if ( ( $user && isset( $user->user_login ) && 'apiki' === $user->user_login ) || $is_localhost ) {
			$wp_admin_bar->add_node(
				array(
					'id'    => 'ghost',
					'title' => '<span class="ab-icon"></span><span class="ab-label">Ghost</span>',
					'href'  => get_theme_file_uri( 'ghost' ),
					'meta'  => array(
						'class' => 'ghost',
						'title' => 'Ghost',
					),
				)
			);
		}
	}

	public function ghost_icon()
	{
		?>
		<style type="text/css">
			#wpadminbar #wp-admin-bar-ghost .ab-icon:before {
				content: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiICAgeG1sbnM6aW5rc2NhcGU9Imh0dHA6Ly93d3cuaW5rc2NhcGUub3JnL25hbWVzcGFjZXMvaW5rc2NhcGUiICAgaWQ9InN2ZzMxMDMiICAgdmVyc2lvbj0iMS4xIiAgIGlua3NjYXBlOnZlcnNpb249IjAuNDguNCByOTkzOSIgICB3aWR0aD0iMTYiICAgaGVpZ2h0PSIxNiIgICBzb2RpcG9kaTpkb2NuYW1lPSJicmFuZGluZy5zdmciPiAgPG1ldGFkYXRhICAgICBpZD0ibWV0YWRhdGEzMTA5Ij4gICAgPHJkZjpSREY+ICAgICAgPGNjOldvcmsgICAgICAgICByZGY6YWJvdXQ9IiI+ICAgICAgICA8ZGM6Zm9ybWF0PmltYWdlL3N2Zyt4bWw8L2RjOmZvcm1hdD4gICAgICAgIDxkYzp0eXBlICAgICAgICAgICByZGY6cmVzb3VyY2U9Imh0dHA6Ly9wdXJsLm9yZy9kYy9kY21pdHlwZS9TdGlsbEltYWdlIiAvPiAgICAgICAgPGRjOnRpdGxlPjwvZGM6dGl0bGU+ICAgICAgPC9jYzpXb3JrPiAgICA8L3JkZjpSREY+ICA8L21ldGFkYXRhPiAgPGRlZnMgICAgIGlkPSJkZWZzMzEwNyIgLz4gIDxzb2RpcG9kaTpuYW1lZHZpZXcgICAgIHBhZ2Vjb2xvcj0iI2ZmZmZmZiIgICAgIGJvcmRlcmNvbG9yPSIjNjY2NjY2IiAgICAgYm9yZGVyb3BhY2l0eT0iMSIgICAgIG9iamVjdHRvbGVyYW5jZT0iMTAiICAgICBncmlkdG9sZXJhbmNlPSIxMCIgICAgIGd1aWRldG9sZXJhbmNlPSIxMCIgICAgIGlua3NjYXBlOnBhZ2VvcGFjaXR5PSIwIiAgICAgaW5rc2NhcGU6cGFnZXNoYWRvdz0iMiIgICAgIGlua3NjYXBlOndpbmRvdy13aWR0aD0iMTM2NiIgICAgIGlua3NjYXBlOndpbmRvdy1oZWlnaHQ9IjcxNSIgICAgIGlkPSJuYW1lZHZpZXczMTA1IiAgICAgc2hvd2dyaWQ9ImZhbHNlIiAgICAgaW5rc2NhcGU6em9vbT0iMjMuNjkyMjM3IiAgICAgaW5rc2NhcGU6Y3g9IjEzLjM4MzYyMyIgICAgIGlua3NjYXBlOmN5PSIxMy40NzgyNjUiICAgICBpbmtzY2FwZTp3aW5kb3cteD0iMCIgICAgIGlua3NjYXBlOndpbmRvdy15PSIzMCIgICAgIGlua3NjYXBlOndpbmRvdy1tYXhpbWl6ZWQ9IjEiICAgICBpbmtzY2FwZTpjdXJyZW50LWxheWVyPSJzdmczMTAzIiAvPiAgPGcgICAgIGlkPSJnMzExMyIgICAgIHRyYW5zZm9ybT0ibWF0cml4KDAuMDcxMTcwODIsMCwwLDAuMDcwNDg0MTEsLTAuOTk3NDY5MjIsLTAuOTc4ODc2NjcpIj4gICAgPHBhdGggICAgICAgc3R5bGU9ImZpbGw6I2ViMWMzOSIgICAgICAgZD0iTSAxOC40LDIzNy42IEMgMTEuOTQ0MTQxLDIzMS4xNDQxNCA3LjQ0MzY0NTIsMjQxLjY2Nzk0IDc3LjAzMDY5NSwxMDAuNSA4OC4xNDY0NDgsNzcuOTUgMTAxLjg3NTA1LDQ5Ljk2ODExIDEwNy41Mzg3LDM4LjMxODAyMyAxMTguNzA0OTksMTUuMzQ5MDM2IDExOS44MTUxMywxNCAxMjcuNTUwMzQsMTQgYyAyLjgxNzI2LDAgNC40MjUxMiwwLjc3NTQ1OCA3LjA0OTY2LDMuNCA2LjE4OTk2LDYuMTg5OTYxIDcuMzI5MTUsMy4yNTA5ODcgLTMzLjIwNjg1LDg1LjY2OTkyIEMgNTguMTcyMjIzLDE5MC45NDc5NCA0OC41MjgxMjcsMjEwLjc2MTU5IDQxLjgwMTU1NSwyMjUuNSBjIC0yLjc2MTIwNSw2LjA1IC01LjQ4NTI2NCwxMS41NzMzNyAtNi4wNTM0NjUsMTIuMjc0MTcgLTAuNTY4MiwwLjcwMDc5IC0wLjgyMzUyMywxLjQ4MzczIC0wLjU2NzM4NSwxLjczOTg3IDAuMjU2MTM5LDAuMjU2MTQgNC40NTE1OTksLTQuNDc3MzggOS4zMjMyNDQsLTEwLjUxODk0IEwgNTMuMzYxNDg2LDIxOC4wMTA0NiAxNDQuNDMwNzQsMjE3Ljc1NTIzIDIzNS41LDIxNy41IDIyMSwyMTQgMjA2LjUsMjEwLjUgMTczLjI3Mzg1LDE0NCBjIC0xOC4yNzQzOCwtMzYuNTc1IC0zMy4yMzY4OCwtNjYuMTk5MjE4IC0zMy4yNSwtNjUuODMxNTk2IC0wLjAxMzEsMC4zNjc2MjIgMS43NzYxNSw3LjIxMTk0OSAzLjk3NjE1LDE1LjIwOTYxNCAyLjIsNy45OTc2NjIgNCwxNS4yNDkwNjIgNCwxNi4xMTQyMDIgMCwyLjUwODEyIC0zNS45NDg1Myw3NS43NjEyMyAtMzguNDQxMTksNzguMzMyNDcgLTMuMDI1MTYsMy4xMjA1MiAtOS4yMzI4OSwzLjkxMjMzIC0xMy40NzQ4NCwxLjcxODczIEMgOTIuOTAyMzc3LDE4Ny44OTgxNiA5MCwxODIuOTg5NzIgOTAsMTc5LjI1NDM1IGMgMCwtMC45OTU0NCA2LjgwMjc4NCwtMTUuNzQ3MzkgMTUuMTE3MywtMzIuNzgyMTIgOC4zMTQ1MSwtMTcuMDM0NzMgMjAuMTYyMDgsLTQxLjM0MTE2IDI2LjMyNzkyLC01NC4wMTQyOTEgNy41OTY4NywtMTUuNjE0NDQyIDEyLjExNTQ0LC0yMy43NTM3OTIgMTQuMDE3NTYsLTI1LjI1IDMuMzc1MjksLTIuNjU1MDA0IDEwLjAxMjYyLC0yLjk2NDEwOSAxMy4zNTY0MywtMC42MjIwMTggMS40Mjk4NCwxLjAwMTUwNCAxNi44MDQ3MiwzMC42NjUwOTcgNDEuNzIyNSw4MC40OTc0OTkgNDAuODE3OCw4MS42MzA0MiA0MS4wODU5Myw4Mi4yNTAyIDM4LjI2MzYsODguNDQ0NTIgQyAyMzYuMjAwODksMjQxLjI0NDA0IDI0MS4xODk0MiwyNDEgMTI2Ljk0OTY2LDI0MSBMIDIxLjgsMjQxIDE4LjQsMjM3LjYgeiIgICAgICAgaWQ9InBhdGgzMTE3IiAgICAgICBpbmtzY2FwZTpjb25uZWN0b3ItY3VydmF0dXJlPSIwIiAvPiAgICA8cGF0aCAgICAgICBzdHlsZT0iZmlsbDojYTYxYzI5IiAgICAgICBkPSJtIDM1LjE1MTc0NiwyMzkuNSBjIDAuMjE1MzQ4LC0wLjU1IDIuNTg0MDU4LC01LjYxMjUgNS4yNjM4LC0xMS4yNSBsIDQuODcyMjU4LC0xMC4yNSAzLjk3ODU0MywwIGMgNC41NjMxMjYsMCA1LjE0MzA0MSwtMS4yOTAzIC01LjE2ODU2NSwxMS41IC03LjA1MzQ3Nyw4Ljc0ODk5IC05LjU0Nzk4NywxMS41MzczOSAtOC45NDYwMzYsMTAgeiBtIDE3Mi45MjU5NjQsLTI1LjM0NzY5IC0xLjk2Mjk1LC0zLjg0NzY4IDEzLjY5MjYyLDMuMzUzODYgYyA3LjUzMDk0LDEuODQ0NjIgMTQuMTQyNjIsMy41NDA1NSAxNC42OTI2MiwzLjc2ODc0IDAuNTUsMC4yMjgxOCAtNC43MjgzNSwwLjQ1MDQgLTExLjcyOTY4LDAuNDkzODIgTCAyMTAuMDQwNjUsMjE4IDIwOC4wNzc3MSwyMTQuMTUyMzEgeiBNIDE0NC40NjA2Miw5NS4yNTQ0MjEgYyAtMi4xNzgzNCwtOC4wOTgzODQgLTQuMDc5NjUsLTE1LjQwNjEwMyAtNC4yMjUxNCwtMTYuMjM5Mzc3IC0wLjE0NTQ4LC0wLjgzMzI3NCAyLjQ1NjI2LDQuMDk0ODY3IDUuNzgxNjYsMTAuOTUxNDI1IDUuNTkwNDEsMTEuNTI2NzMxIDUuOTU2MzIsMTIuNjk1MTQxIDQuODU0MjQsMTUuNTAwMDAxIC0wLjY1NTU2LDEuNjY4NDQgLTEuNDc1MDMsMy4zNjYyNSAtMS44MjEwMywzLjc3MjkxIC0wLjM0NjAxLDAuNDA2NjUgLTIuNDExMzgsLTUuODg2NTggLTQuNTg5NzMsLTEzLjk4NDk1OSB6IiAgICAgICBpZD0icGF0aDMxMTUiICAgICAgIGlua3NjYXBlOmNvbm5lY3Rvci1jdXJ2YXR1cmU9IjAiIC8+ICA8L2c+PC9zdmc+);
			}
		</style>
		<?php
	}

	private function _handle_instance( $class, $activate )
	{
		$instance = new $class( $activate );

		if ( $activate ) {
			$instance->add_capabilities( array( 'administrator', 'editor' ) );
			unset( $instance );
		}
	}
}
