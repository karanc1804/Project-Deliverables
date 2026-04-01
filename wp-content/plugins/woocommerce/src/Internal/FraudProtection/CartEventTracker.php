<?php
/**
 * CartEventTracker class file.
 */

declare( strict_types=1 );

namespace Automattic\WooCommerce\Internal\FraudProtection;

defined( 'ABSPATH' ) || exit;

/**
 * Tracks cart events for fraud protection analysis.
 *
 * This class provides methods to track cart events (add, update, remove, restore)
<<<<<<< HEAD
 * for fraud protection. Event-specific data is passed
 * to the SessionDataCollector which handles session data storage internally.
=======
 * for fraud protection event dispatching. Event-specific data is passed
 * to the dispatcher which handles session data collection internally.
>>>>>>> origin/main
 *
 * @since 10.5.0
 * @internal This class is part of the internal API and is subject to change without notice.
 */
class CartEventTracker {

	/**
<<<<<<< HEAD
	 * Session data collector instance.
	 *
	 * @var SessionDataCollector
	 */
	private SessionDataCollector $session_data_collector;
=======
	 * Fraud protection dispatcher instance.
	 *
	 * @var FraudProtectionDispatcher
	 */
	private FraudProtectionDispatcher $dispatcher;
>>>>>>> origin/main

	/**
	 * Initialize with dependencies.
	 *
	 * @internal
	 *
<<<<<<< HEAD
	 * @param SessionDataCollector $session_data_collector The session data collector instance.
	 */
	final public function init( SessionDataCollector $session_data_collector ): void {
		$this->session_data_collector = $session_data_collector;
=======
	 * @param FraudProtectionDispatcher $dispatcher The fraud protection dispatcher instance.
	 */
	final public function init( FraudProtectionDispatcher $dispatcher ): void {
		$this->dispatcher = $dispatcher;
>>>>>>> origin/main
	}

	/**
	 * Track cart page loaded event.
	 *
<<<<<<< HEAD
	 * Collects session data when the cart page is initially loaded.
=======
	 * Triggers fraud protection event dispatching when the cart page is initially loaded.
>>>>>>> origin/main
	 * This captures the initial session state before any user interactions.
	 *
	 * @internal
	 * @return void
	 */
	public function track_cart_page_loaded(): void {
<<<<<<< HEAD
		$this->session_data_collector->collect( 'cart_page_loaded', array() );
=======
		// Track the page load event. Session data will be collected by the dispatcher.
		$this->dispatcher->dispatch_event( 'cart_page_loaded', array() );
>>>>>>> origin/main
	}

	/**
	 * Track cart item added event.
	 *
<<<<<<< HEAD
	 * Collects session data when an item is added to the cart.
=======
	 * Triggers fraud protection event dispatching when an item is added to the cart.
>>>>>>> origin/main
	 *
	 * @internal
	 *
	 * @param string $cart_item_key  Cart item key.
	 * @param int    $product_id     Product ID.
	 * @param int    $quantity       Quantity added.
	 * @param int    $variation_id   Variation ID.
	 * @return void
	 */
	public function track_cart_item_added( $cart_item_key, $product_id, $quantity, $variation_id ): void {
		$event_data = $this->build_cart_event_data(
			'item_added',
			$product_id,
			$quantity,
			$variation_id
		);

<<<<<<< HEAD
		$this->session_data_collector->collect( 'cart_item_added', $event_data );
=======
		// Trigger event dispatching.
		$this->dispatcher->dispatch_event( 'cart_item_added', $event_data );
>>>>>>> origin/main
	}

	/**
	 * Track cart item quantity updated event.
	 *
<<<<<<< HEAD
	 * Collects session data when cart item quantity is updated.
=======
	 * Triggers fraud protection event dispatching when cart item quantity is updated.
>>>>>>> origin/main
	 *
	 * @internal
	 *
	 * @param string $cart_item_key Cart item key.
	 * @param int    $quantity      New quantity.
	 * @param int    $old_quantity  Old quantity.
	 * @param object $cart          Cart object.
	 * @return void
	 */
	public function track_cart_item_updated( $cart_item_key, $quantity, $old_quantity, $cart ): void {
		$cart_item = $cart->cart_contents[ $cart_item_key ] ?? null;

		if ( (int) $quantity === (int) $old_quantity || ! $cart_item ) {
			return;
		}

		$product_id   = $cart_item['product_id'] ?? 0;
		$variation_id = $cart_item['variation_id'] ?? 0;

		$event_data = $this->build_cart_event_data(
			'item_updated',
			$product_id,
			(int) $quantity,
			$variation_id
		);

<<<<<<< HEAD
		$event_data['old_quantity'] = (int) $old_quantity;

		$this->session_data_collector->collect( 'cart_item_updated', $event_data );
=======
		// Add old quantity for context.
		$event_data['old_quantity'] = (int) $old_quantity;

		// Trigger event dispatching.
		$this->dispatcher->dispatch_event( 'cart_item_updated', $event_data );
>>>>>>> origin/main
	}

	/**
	 * Track cart item removed event.
	 *
<<<<<<< HEAD
	 * Collects session data when an item is removed from the cart.
=======
	 * Triggers fraud protection event dispatching when an item is removed from the cart.
>>>>>>> origin/main
	 *
	 * @internal
	 *
	 * @param string $cart_item_key Cart item key.
	 * @param object $cart          Cart object.
	 * @return void
	 */
	public function track_cart_item_removed( $cart_item_key, $cart ): void {
		$cart_item = $cart->removed_cart_contents[ $cart_item_key ] ?? null;

		if ( ! $cart_item ) {
			return;
		}

		$product_id   = $cart_item['product_id'] ?? 0;
		$variation_id = $cart_item['variation_id'] ?? 0;
		$quantity     = $cart_item['quantity'] ?? 0;

		$event_data = $this->build_cart_event_data(
			'item_removed',
			$product_id,
			$quantity,
			$variation_id
		);

<<<<<<< HEAD
		$this->session_data_collector->collect( 'cart_item_removed', $event_data );
=======
		// Trigger event dispatching.
		$this->dispatcher->dispatch_event( 'cart_item_removed', $event_data );
>>>>>>> origin/main
	}

	/**
	 * Track cart item restored event.
	 *
<<<<<<< HEAD
	 * Collects session data when a removed item is restored to the cart.
=======
	 * Triggers fraud protection event dispatching when a removed item is restored to the cart.
>>>>>>> origin/main
	 *
	 * @internal
	 *
	 * @param string $cart_item_key Cart item key.
	 * @param object $cart          Cart object.
	 * @return void
	 */
	public function track_cart_item_restored( $cart_item_key, $cart ): void {
		$cart_item = $cart->cart_contents[ $cart_item_key ] ?? null;

		if ( ! $cart_item ) {
			return;
		}

		$product_id   = $cart_item['product_id'] ?? 0;
		$variation_id = $cart_item['variation_id'] ?? 0;
		$quantity     = $cart_item['quantity'] ?? 0;

		$event_data = $this->build_cart_event_data(
			'item_restored',
			$product_id,
			$quantity,
			$variation_id
		);

<<<<<<< HEAD
		$this->session_data_collector->collect( 'cart_item_restored', $event_data );
=======
		// Trigger event dispatching.
		$this->dispatcher->dispatch_event( 'cart_item_restored', $event_data );
>>>>>>> origin/main
	}

	/**
	 * Build cart event-specific data.
	 *
	 * Prepares the cart event data including action type, product details,
	 * and current cart state. This data will be merged with comprehensive
	 * session data during event dispatching.
	 *
	 * @param string $action       Action type (item_added, item_updated, item_removed, item_restored).
	 * @param int    $product_id   Product ID.
	 * @param int    $quantity     Quantity.
	 * @param int    $variation_id Variation ID.
	 * @return array Cart event data.
	 */
	private function build_cart_event_data( string $action, int $product_id, int $quantity, int $variation_id ): array {
		$cart_item_count = 0;

		// Get current cart item count if cart is available.
		if ( WC()->cart instanceof \WC_Cart ) {
			$cart_item_count = WC()->cart->get_cart_contents_count();
		}

		return array(
			'action'          => $action,
			'product_id'      => $product_id,
			'quantity'        => $quantity,
			'variation_id'    => $variation_id,
			'cart_item_count' => $cart_item_count,
		);
	}
}
