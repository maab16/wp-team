<?php

class WP_Team_Manager_Loader {

	/**
	 * @var array $actions
	 */
	protected $actions = [];

	/**
	 * @var array $filters
	 */
	protected $filters = [];

	/**
	 * Add all action into @var $actions
	 * @param string $hook
	 * @param object $component
	 * @param callable $callback
	 * @return void
	 */
	public function add_action( $hook, $component, $callback ) {
		$this->actions = $this->add_hooks( $this->actions, $hook, $component, $callback );
	}

	/**
	 * Add all filter into @var $filters
	 * @param string $hook
	 * @param object $component
	 * @param callable $callback
	 * @return void
	 */
	public function add_filter( $hook, $component, $callback ) {
		$this->filters = $this->add_hooks( $this->filters, $hook, $component, $callback );
	}

	/**
	 * Prepare Hooks
	 * @param array $hooks
	 * @param string $hook
	 * @param object $component
	 * @param callable $callback
	 * @return array $hooks
	 */
	private function add_hooks( $hooks, $hook, $component, $callback ) {

		$hooks[] = [
			'hook'      => $hook,
			'object' => $component,
			'callback'  => $callback
		];

		return $hooks;
	}

	/**
	 * Run the all hooks
	 * @param No
	 * @return void
	 */
	public function run() {

		 foreach ( $this->filters as $filter ) {
			 add_filter( $filter['hook'], array( $filter['object'], $filter['callback'] ) );
		 }

		 foreach ( $this->actions as $action ) {
			 add_action( $action['hook'], array( $action['object'], $action['callback'] ) );
		 }

	}

}