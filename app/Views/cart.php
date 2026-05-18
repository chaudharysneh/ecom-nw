<?= $this->include('header') ?>
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<!-- Elegant Scoped Styles for Shopping Cart -->
<style>
	:root {
		--primary-color: #8C4E2D; /* Sophisticated warm brown signature */
		--primary-hover: #753E22;
		--bg-beige: #F9F7F5; /* Soft sophisticated backdrop */
		--card-bg: #FFFFFF;
		--text-main: #2A2421; /* Deep charcoal */
		--text-muted: #7E7672; /* Warm gray */
		--text-light: #A09690;
		--border-color: #ECE9E6; /* Premium warm borders */
		--accent-green: #2E7D32; /* In Stock & Free shipping Badge */
		--accent-green-bg: #E8F5E9;
		--accent-red: #D32F2F; /* Delete hover */
		--accent-red-bg: #FFEBEE;
		--paypal-bg: #FFF2CC;
		--paypal-border: #FFE599;
		--shadow-soft: 0 8px 30px rgba(140, 78, 45, 0.02);
		--shadow-card: 0 10px 40px rgba(0, 0, 0, 0.01);
		--border-radius-lg: 12px;
		--border-radius-md: 8px;
		--border-radius-sm: 6px;
		--transition-smooth: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
		--font-outfit: 'Outfit', sans-serif;
	}

	body {
		background-color: var(--bg-beige) !important;
	}

	.main-category {
		display: none;
	}

	/* --- Breadcrumbs Redesign --- */
	.breadcrumbs {
		/* background: transparent !important; */
		padding: 15px 30px !important;
		border: none !important;
	}

	.bread-list {
		display: flex;
		align-items: center;
		gap: 8px;
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.bread-list li {
		font-size: 13px;
		font-weight: 500;
		font-family: var(--font-outfit);
	}

	.bread-list li a {
		color: var(--text-light);
		text-decoration: none;
		transition: var(--transition-smooth);
	}

	.bread-list li a:hover {
		color: var(--primary-color);
	}

	.bread-list li i {
		font-size: 10px;
		color: var(--text-light);
		margin-left: 8px;
	}

	.bread-list li.active a {
		color: var(--text-main);
		font-weight: 600;
	}

	/* --- Page Header --- */
	.cart-page-header {
		display: flex;
		justify-content: space-between;
		align-items: baseline;
		margin-bottom: 24px;
		padding-bottom: 12px;
		font-family: var(--font-outfit);
	}

	.cart-title {
		font-size: 26px;
		font-weight: 700;
		color: var(--text-main);
		margin: 0;
	}

	.cart-count-badge {
		font-size: 16px;
		font-weight: 500;
		color: var(--text-muted);
		margin-left: 4px;
	}

	.continue-shopping-link {
		font-size: 14px;
		font-weight: 600;
		color: var(--primary-color);
		text-decoration: none !important;
		display: flex;
		align-items: center;
		gap: 6px;
		transition: var(--transition-smooth);
	}

	.continue-shopping-link:hover {
		color: var(--primary-hover);
		transform: translateX(2px);
	}

	/* --- Populated Cart Grid Layout --- */
	.cart-card {
		background: var(--card-bg);
		border-radius: var(--border-radius-lg);
		/* padding: 30px; */
		box-shadow: var(--shadow-soft);
		border: 1px solid var(--border-color);
		margin-bottom: 24px;
	}

	/* --- Cart Table --- */
	.shopping-summery {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 0 !important;
	}

	.shopping-summery thead tr {
		border-bottom: 1px solid var(--border-color);
	}

	.shopping-summery th {
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 600;
		color: var(--text-muted);
		padding: 12px 16px 20px 16px !important;
		border: none !important;
		text-transform: capitalize;
	}

	.shopping-summery tbody tr {
		border-bottom: 1px solid var(--border-color);
		transition: var(--transition-smooth);
	}

	.shopping-summery tbody tr:last-child {
		border-bottom: none;
	}

	.shopping-summery td {
		/* padding: 24px 16px !important; */
		vertical-align: middle !important;
		border: none !important;
	}

	/* Product column styles */
	.shopping-summery td.product-col {
		width: 46%;
	}

	.cart-product-layout {
		display: flex;
		align-items: center;
		gap: 14px;
		min-width: 0;
	}

	.shopping-summery .product-img-wrap {
		width: 80px;
		height: 80px;
		border-radius: var(--border-radius-md);
		border: 1px solid var(--border-color);
		overflow: hidden;
		flex-shrink: 0;
		background: #FFF;
	}

	.shopping-summery .product-img-wrap img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.product-info-wrap {
		flex: 1;
		min-width: 0;
	}

	.product-des-title {
		font-family: var(--font-outfit);
		font-size: 16px;
		font-weight: 600;
		line-height: 1.35;
		margin-bottom: 6px;
	}

	.product-des-title a {
		color: var(--text-main);
		text-decoration: none !important;
		transition: var(--transition-smooth);
	}

	.product-des-title a:hover {
		color: var(--primary-color);
	}

	.product-variation-info {
		font-size: 13px;
		color: var(--text-muted);
		line-height: 1.4;
		margin-bottom: 6px;
	}

	.stock-badge {
		display: inline-flex;
		align-items: center;
		background: var(--accent-green-bg);
		color: var(--accent-green);
		padding: 3px 8px;
		border-radius: var(--border-radius-sm);
		font-size: 11px;
		font-weight: 600;
		margin-top: 2px;
	}

	.shopping-summery td.price {
		font-family: var(--font-outfit);
		font-size: 15px;
		font-weight: 600;
		color: var(--text-main);
	}

	.shopping-summery td.qty {
		text-align: center;
		width: 170px;
	}

	/* --- Rectangular divided Quantity Selector --- */
	.quantity-control {
		display: inline-flex;
		align-items: center;
		background: #FFF;
		border: 1px solid #D0C9C0;
		border-radius: var(--border-radius-sm);
		height: 34px;
		overflow: hidden;
		margin: 0 auto;
	}

	.quantity-control button {
		background: transparent;
		border: none;
		width: 32px;
		height: 32px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: var(--text-main);
		cursor: pointer;
		font-size: 10px;
		transition: var(--transition-smooth);
	}

	.quantity-control button:hover {
		background: #FAF8F6;
		color: var(--primary-color);
	}

	.quantity-control input {
		width: 38px;
		height: 32px;
		border: none;
		border-left: 1px solid #D0C9C0;
		border-right: 1px solid #D0C9C0;
		background: transparent;
		text-align: center;
		font-size: 13px;
		font-weight: 600;
		color: var(--text-main);
		font-family: var(--font-outfit);
		outline: none;
		pointer-events: none;
	}

	.shopping-summery td.total_amount {
		font-family: var(--font-outfit);
		font-size: 15px;
		font-weight: 600;
		color: var(--text-main);
		white-space: nowrap;
	}

	.shopping-summery td.price,
	.shopping-summery td.total_amount {
		white-space: nowrap;
	}

	.shopping-summery td.action {
		text-align: right;
	}

	.remove-item-btn {
		background: transparent;
		border: none;
		color: var(--text-light);
		font-size: 16px;
		width: 36px;
		height: 36px;
		border-radius: 50%;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		transition: var(--transition-smooth);
	}

	.remove-item-btn:hover {
		background: var(--accent-red-bg);
		color: var(--accent-red);
	}

	/* --- Coupon Card bottom left --- */
	.coupon-card-footer {
		background: #FCFAF9;
		border: 1px solid var(--border-color);
		border-radius: var(--border-radius-lg);
		padding: 18px 24px;
		box-shadow: var(--shadow-soft);
	}

	.coupon-input {
		height: 38px;
		width: 300px;
		border: 1px solid #D0C9C0;
		border-radius: var(--border-radius-sm);
		padding: 0 16px;
		font-size: 13px;
		color: var(--text-main);
		outline: none;
		transition: var(--transition-smooth);
		background: #FFF;
	}

	.coupon-input:focus {
		border-color: var(--primary-color);
		box-shadow: 0 0 0 3px rgba(140, 78, 45, 0.06);
	}

	.coupon-apply-btn {
		height: 38px;
		border-radius: var(--border-radius-sm);
		background: transparent;
		color: var(--primary-color) !important;
		border: 1px solid var(--primary-color);
		padding: 0 24px;
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 600;
		cursor: pointer;
		transition: var(--transition-smooth);
	}

	.coupon-apply-btn:hover {
		background: var(--primary-color);
		color: #FFF !important;
	}

	/* Applied Coupon Card */
	.applied-coupon-pill {
		background: #EAF7F0;
		border: 1px solid #C2ECD5;
		border-radius: var(--border-radius-sm);
		padding: 8px 16px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		width: 100%;
	}

	.applied-coupon-info {
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 600;
		color: #1D9B5E;
	}

	.remove-coupon-btn {
		background: transparent;
		border: none;
		color: #1D9B5E;
		cursor: pointer;
		font-size: 14px;
		padding: 4px;
		transition: var(--transition-smooth);
	}

	.remove-coupon-btn:hover {
		color: #D32F2F;
		transform: scale(1.1);
	}

	.show-all-coupons-trigger {
		background: transparent;
		border: none;
		color: var(--primary-color);
		font-size: 12px;
		font-weight: 600;
		cursor: pointer;
		display: inline-flex;
		align-items: center;
		gap: 6px;
		outline: none !important;
		transition: var(--transition-smooth);
	}

	.show-all-coupons-trigger:hover {
		color: var(--primary-hover);
	}

	.coupon-list {
		list-style: none;
		padding: 0;
		margin: 12px 0 0 0;
		max-height: 200px;
		overflow-y: auto;
		display: flex;
		flex-direction: column;
		gap: 8px;
	}

	.coupon-item-card {
		background: #FAF8F6;
		border: 1px dashed var(--border-color);
		border-radius: var(--border-radius-sm);
		padding: 10px 14px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.coupon-item-code {
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 700;
		color: var(--text-main);
	}

	.coupon-item-lbl {
		font-size: 10px;
		color: var(--text-light);
		text-transform: uppercase;
		letter-spacing: 0.05em;
	}

	.selectCouponBtn {
		background: #FFF;
		border: 1px solid var(--border-color);
		color: var(--primary-color);
		font-size: 11px;
		font-weight: 600;
		padding: 4px 10px;
		border-radius: 30px;
		cursor: pointer;
		transition: var(--transition-smooth);
	}

	.selectCouponBtn:hover {
		background: var(--primary-color);
		color: #FFF;
	}

	/* --- Sidebar Checkout Card --- */
	.sidebar-checkout-card {
		background: var(--card-bg);
		border-radius: var(--border-radius-lg);
		padding: 24px;
		border: 1px solid var(--border-color);
		box-shadow: var(--shadow-soft);
		margin-bottom: 24px;
	}

	.sidebar-card-title {
		font-family: var(--font-outfit);
		font-size: 18px;
		font-weight: 700;
		color: var(--text-main);
		margin-bottom: 20px;
	}

	/* --- Order Summary Table Redesign --- */
	.order-summary-table {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 16px;
	}

	.order-summary-table tr {
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 10px 0;
	}

	.order-summary-table td, 
	.order-summary-table th {
		padding: 0 !important;
		border: none !important;
		background: transparent !important;
	}

	.order-summary-table td {
		font-size: 14px;
		color: var(--text-muted);
		font-weight: 500;
	}

	.order-summary-table th {
		font-family: var(--font-outfit);
		font-size: 14px;
		font-weight: 600;
		color: var(--text-main);
		text-align: right;
	}

	.order-summary-table tr.total {
		padding-top: 16px;
		border-top: 1px solid var(--border-color);
		margin-top: 4px;
	}

	.order-summary-table tr.total td {
		font-family: var(--font-outfit);
		font-size: 18px;
		font-weight: 700;
		color: var(--text-main);
	}

	.order-summary-table tr.total th {
		font-family: var(--font-outfit);
		font-size: 22px;
		font-weight: 800;
		color: var(--text-main);
	}

	/* Savings indicator */
	.savings-notification {
		color: var(--accent-green);
		font-size: 13px;
		font-weight: 500;
		margin-top: 4px;
		margin-bottom: 16px;
		text-align: left;
	}

	/* --- Checkout Actions --- */
	.checkout-action-buttons {
		display: flex;
		flex-direction: column;
		gap: 12px;
	}

	.checkout-primary-btn {
		width: 100%;
		height: 48px;
		border-radius: var(--border-radius-sm);
		background: var(--primary-color);
		color: #FFF !important;
		font-family: var(--font-outfit);
		font-size: 14px;
		font-weight: 600;
		border: none;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 8px;
		cursor: pointer;
		text-decoration: none !important;
		transition: var(--transition-smooth);
	}

	.checkout-primary-btn:hover {
		background: var(--primary-hover);
	}

	.checkout-paypal-btn {
		width: 100%;
		height: 48px;
		border-radius: var(--border-radius-sm);
		background: var(--paypal-bg);
		border: 1px solid var(--paypal-border);
		color: var(--text-main);
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 600;
		display: flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		transition: var(--transition-smooth);
	}

	.checkout-paypal-btn:hover {
		background: #FCE6AD;
	}

	/* --- Trust Badges Stack --- */
	.trust-badges-grid {
		display: flex;
		flex-direction: column;
		gap: 16px;
		margin-top: 24px;
		padding-top: 24px;
		border-top: 1px solid var(--border-color);
	}

	.trust-badge-item {
		display: flex;
		align-items: center;
		gap: 14px;
	}

	.trust-badge-icon {
		width: 36px;
		height: 36px;
		border-radius: 50%;
		border: 1px solid var(--border-color);
		display: flex;
		align-items: center;
		justify-content: center;
		color: var(--text-muted);
		font-size: 15px;
		flex-shrink: 0;
	}

	.trust-badge-texts h5 {
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 600;
		color: var(--text-main);
		margin: 0 0 1px 0;
	}

	.trust-badge-texts p {
		font-size: 11px;
		color: var(--text-light);
		margin: 0;
	}

	/* --- Empty Cart Redesign --- */
	.empty-cart-card {
		background: var(--card-bg);
		border-radius: var(--border-radius-lg);
		padding: 60px 40px;
		border: 1px solid var(--border-color);
		box-shadow: var(--shadow-soft);
		text-align: center;
		margin-bottom: 40px;
	}

	.empty-cart-title {
		font-family: var(--font-outfit);
		font-size: 24px;
		font-weight: 700;
		color: var(--text-main);
		margin: 16px 0 8px 0;
	}

	.empty-cart-desc {
		font-size: 15px;
		color: var(--text-muted);
		line-height: 1.6;
		max-width: 400px;
		margin: 0 auto 30px auto;
	}

	.empty-cart-btn {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		height: 46px;
		padding: 0 30px;
		background: var(--primary-color);
		color: #FFF !important;
		font-family: var(--font-outfit);
		font-size: 14px;
		font-weight: 600;
		border-radius: var(--border-radius-sm);
		text-decoration: none !important;
		transition: var(--transition-smooth);
	}

	.empty-cart-btn:hover {
		background: var(--primary-hover);
	}

	/* --- Recommendations "You May Like" --- */
	.recommendations-sidebar {
		background: var(--card-bg);
		border-radius: var(--border-radius-lg);
		padding: 24px;
		border: 1px solid var(--border-color);
		box-shadow: var(--shadow-soft);
		margin-bottom: 30px;
	}

	.recommendations-title {
		font-family: var(--font-outfit);
		font-size: 18px;
		font-weight: 700;
		color: var(--text-main);
		margin-bottom: 20px;
		display: flex;
		align-items: center;
		gap: 8px;
		border-bottom: 1px solid var(--border-color);
		padding-bottom: 10px;
	}

	.recommendations-list {
		display: flex;
		flex-direction: column;
		gap: 20px;
	}

	.rec-item {
		display: flex;
		align-items: center;
		gap: 16px;
		padding-bottom: 20px;
		border-bottom: 1px solid var(--border-color);
	}

	.rec-item:last-child {
		border-bottom: none;
		padding-bottom: 0;
	}

	.rec-img-wrap {
		width: 70px;
		height: 70px;
		border-radius: var(--border-radius-md);
		border: 1px solid var(--border-color);
		overflow: hidden;
		flex-shrink: 0;
		background: #FFF;
	}

	.rec-img-wrap img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: var(--transition-smooth);
	}

	.rec-item:hover .rec-img-wrap img {
		transform: scale(1.08);
	}

	.rec-details {
		flex: 1;
		min-width: 0;
	}

	.rec-name {
		font-family: var(--font-outfit);
		font-size: 14px;
		font-weight: 600;
		margin: 0 0 4px 0;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.rec-name a {
		color: var(--text-main);
		text-decoration: none !important;
		transition: var(--transition-smooth);
	}

	.rec-name a:hover {
		color: var(--primary-color);
	}

	.rec-rating {
		display: flex;
		align-items: center;
		gap: 4px;
		font-size: 11px;
		color: #F8A41E;
		margin-bottom: 4px;
	}

	.rec-rating span {
		color: var(--text-light);
		margin-left: 2px;
	}

	.rec-price {
		font-family: var(--font-outfit);
		display: flex;
		align-items: baseline;
		gap: 6px;
	}

	.rec-price .curr-price {
		font-size: 14px;
		font-weight: 700;
		color: var(--primary-color);
	}

	.rec-price .old-price {
		font-size: 11px;
		color: var(--text-light);
		text-decoration: line-through;
	}

	.rec-action {
		flex-shrink: 0;
	}

	.rec-add-btn {
		background: transparent;
		border: 1px solid var(--primary-color);
		color: var(--primary-color);
		font-family: var(--font-outfit);
		font-size: 12px;
		font-weight: 600;
		padding: 6px 14px;
		border-radius: 30px;
		cursor: pointer;
		display: inline-flex;
		align-items: center;
		gap: 4px;
		transition: var(--transition-smooth);
	}

	.rec-add-btn:hover {
		background: var(--primary-color);
		color: #FFF;
		transform: translateY(-1px);
	}

	.rec-view-more {
		font-family: var(--font-outfit);
		font-size: 13px;
		font-weight: 600;
		color: var(--primary-color);
		text-decoration: none !important;
		transition: var(--transition-smooth);
		display: inline-flex;
		align-items: center;
	}

	.rec-view-more:hover {
		color: var(--primary-hover);
	}

	/* --- Custom Webkit Scrollbars --- */
	.coupon-list::-webkit-scrollbar {
		width: 6px;
	}

	.coupon-list::-webkit-scrollbar-thumb {
		background-color: var(--text-light);
		border-radius: 10px;
	}

	/* --- Responsive Mobile Overrides --- */
	@media (max-width: 991px) {
		.cart-card, 
		.sidebar-checkout-card {
			padding: 20px;
		}
	}

	@media (max-width: 767px) {
		.shopping-summery, 
		.shopping-summery tbody, 
		.shopping-summery tr, 
		.shopping-summery td {
			display: block !important;
			width: 100% !important;
		}

		.shopping-summery thead {
			display: none !important;
		}

		.shopping-summery tr {
			position: relative;
			padding: 16px;
			background: #FFF;
			border-radius: var(--border-radius-md);
			border: 1px solid var(--border-color);
			margin-bottom: 16px;
			box-shadow: var(--shadow-card);
		}

		.shopping-summery td {
			padding: 8px 0 !important;
			border: none !important;
			display: flex !important;
			justify-content: space-between;
			align-items: center;
			text-align: left !important;
		}

		.shopping-summery td.product-col {
			padding-bottom: 12px !important;
			border-bottom: 1px solid var(--border-color) !important;
			width: 100%;
		}

		.shopping-summery .product-img-wrap {
			width: 80px;
			height: 80px;
		}

		.cart-product-layout {
			gap: 12px;
			align-items: flex-start;
		}

		/* Inject titles on mobile cells */
		.shopping-summery td::before {
			content: attr(data-title);
			font-size: 11px;
			font-weight: 700;
			color: var(--text-light);
			text-transform: uppercase;
			letter-spacing: 0.05em;
			font-family: var(--font-outfit);
		}

		.shopping-summery td.product-col::before, 
		.shopping-summery td.action::before {
			display: none !important;
		}

		.shopping-summery td.action {
			position: absolute;
			top: 10px;
			right: 10px;
			width: auto !important;
			padding: 0 !important;
		}
	}
</style>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="<?php echo base_url('/'); ?>">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="<?php echo base_url('cart'); ?>">Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Main Shopping Cart Section -->
<div class="shopping-cart">
	<div class="container-fluid">
		
		<?php if (!empty($cart)) { ?>
			<!-- Redesigned Populated Cart Header -->
			<div class="cart-page-header">
				<div>
					<h1 class="cart-title">Your Cart <span class="cart-count-badge">(<?php echo count($cart); ?> <?php echo count($cart) == 1 ? 'Item' : 'Items'; ?>)</span></h1>
				</div>
				<a href="<?php echo base_url('product'); ?>" class="continue-shopping-link">
					Continue Shopping <i class="fa-solid fa-arrow-right"></i>
				</a>
			</div>

			<div class="row">
				<!-- Left Column: Products List Card & Coupon Card -->
				<div class="col-lg-8 col-12">
					<div class="cart-card">
						<form action="" method="POST" id="cartProductList">
							<table class="table shopping-summery">
								<thead>
									<tr class="main-hading">
										<th>Product</th>
										<th>Price</th>
										<th class="text-center">Quantity</th>
										<th>Total</th> 
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php    
									foreach ($cart as $item) {
										$imgurl = !empty($item['ProductImage']) ? $item['ProductImage'] : '';
										
										// Safely resolve Price and Subtotal per product item
										$itemUnitPrice = 0;
										$isVariationProduct = empty($item['price']);
										$itemVarId = '';
										
										if (!$isVariationProduct) {
											$itemUnitPrice = $item['unit_price'];
											$itemTotal = $item['total'];
											$itemId = $item['id'];
										} else {
											$variations = new App\Models\Variationmodel();
											$varia_dt = $variations->where('ProductID', $item['id'])->first();
											$itemVarId = $varia_dt['VariationID'] ?? '';
											
											$pricearr = [];
											$varia_dt_all = $variations->where('ProductID', $item['id'])->get()->getResult('array');
											foreach ($varia_dt_all as $vardt) {
												$pricearr[] = $vardt['VariationPrice'];
											}
											$itemUnitPrice = array_sum($pricearr);
											$itemTotal = $itemUnitPrice * $item['quantity'];
											$itemId = $varia_dt['ProductID'] ?? $item['id'];
										}
										?>
										<tr id="<?php echo $item['id']; ?>">
											<!-- Combined Product Image & Details Cell -->
											<td class="product-col" data-title="Product">
												<div class="cart-product-layout">
													<div class="product-img-wrap">
														<img src="<?php echo $imgurl; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
													</div>
													<div class="product-info-wrap">
														<h3 class="product-des-title">
															<a href="<?php echo base_url($item['slug'] . "/" . 'product_detail/' . base64_encode($item['id'])); ?>">
																<?php echo $item['name']; ?>
															</a>
														</h3>
														<div class="product-variation-info">
															<?php
															if (isset($item['vari_data']) && !empty($item['vari_data'])) {
																foreach ($item['vari_data'] as $single_vari) {
																	echo "<strong>" . htmlspecialchars($single_vari['VariationTypeName']) . ": </strong>" . htmlspecialchars($single_vari['VariationName']) . "<br>";
																}
															} else {
																echo htmlspecialchars($item['ProductCartDesc']);
															}
															?>
														</div>
														<span class="stock-badge">In Stock</span>
													</div>
												</div>
											</td>
											
											<!-- Price Cell -->
											<td class="price" data-title="Price">
												<span><?php echo $all_setting_data['currency']; ?><?php echo number_format($itemUnitPrice, 2); ?></span>
											</td>
											
											<!-- Qty Selector -->
											<td class="qty" data-title="Quantity">
												<div class="quantity-control">
													<button type="button" class="btn-number" data-type="minus" data-id="<?php echo $itemId; ?>" data-price="<?php echo $itemUnitPrice; ?>" data-field="quant[<?php echo $itemId; ?>]">
														<i class="fa-solid fa-minus"></i>
													</button>
													<input type="text" name="quant[<?php echo $itemId; ?>]" class="input-number" data-min="1" data-max="100" value="<?php echo $item['quantity']; ?>" readonly>
													<button type="button" class="btn-number" data-type="plus" data-id="<?php echo $itemId; ?>" data-price="<?php echo $itemUnitPrice; ?>" data-field="quant[<?php echo $itemId; ?>]">
														<i class="fa-solid fa-plus"></i>
													</button>
												</div>
												<?php if ($isVariationProduct && !empty($itemVarId)) { ?>
													<input type="hidden" name="variationId[<?php echo $itemId; ?>]" value="<?php echo $itemVarId; ?>">
												<?php } ?>
											</td>
											
											<!-- Item Total Cell -->
											<td class="total_amount" data-title="Total" data-id="<?php echo $item['id']; ?>">
												<span><?php echo $all_setting_data['currency']; ?><?php echo number_format($itemTotal, 2); ?></span>
											</td>
											
											<!-- Action Remove Cell -->
											<td class="action">
												<button type="button" class="remove-item-btn removeItem" data-id="<?php echo $item['id']; ?>">
													<i class="fa-regular fa-trash-can"></i>
												</button>
											</td>
										</tr>
										<?php
									}
									?>
									
									<!-- Subtotal row inside the tbody -->
									<tr class="cart-subtotal-row" style="background: transparent;">
										<td colspan="3" class="text-right" style="font-family: var(--font-outfit); font-weight: 600; font-size: 15px; color: var(--text-main); border-top: 1px solid var(--border-color); padding: 20px 16px !important; text-align: right;">Subtotal</td>
										<td class="cart-table-subtotal-val text-left" style="font-family: var(--font-outfit); font-weight: 700; font-size: 18px; color: var(--primary-color); border-top: 1px solid var(--border-color); padding: 20px 16px !important;">
											<?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->subtotal, 2); ?>
										</td>
										<td style="border-top: 1px solid var(--border-color); padding: 20px 16px !important;"></td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
						</form>
					</div>

					<!-- Coupon Card (Footer Row of Left Column) -->
					<div class="coupon-card-footer mb-4">
						<?php 
						$couponCode = "";
						if (session()->has('couponCode')) {
							$couponCode = session()->get('couponCode');
						}
						?>
						
						<!-- Active Coupon Pill -->
						<div id="removeCouponForm" class="applied-coupon-pill" style="<?php echo ($couponCode == "") ? 'display:none' : ''; ?>">
							<div class="applied-coupon-info">
								<i class="fa-solid fa-square-check"></i> Coupon: <span class="couponname"><?= htmlspecialchars($couponCode); ?></span>
							</div>
							<button type="button" class="remove-coupon-btn removeCoupon">
								<i class="fa-solid fa-circle-xmark"></i>
							</button>
						</div>

						<!-- Coupon Apply Form -->
						<form id="apllyCouponForm" class="apllyCouponForm" action="POST" style="<?php echo ($couponCode != "") ? 'display:none' : ''; ?>">
							<div class="d-flex align-items-center justify-content-between w-100 flex-wrap gap-3">
								<div class="align-items-center gap-2">
									<i class="fa-solid fa-tag" style="color: var(--primary-color); font-size: 16px;"></i>
									<span style="font-weight: 600; font-size: 14px; color: var(--text-main);">Have a coupon code?</span>
								</div>
								<div class="align-items-center gap-2">
									<input type="text" placeholder="Enter coupon code" value="<?php echo htmlspecialchars($couponCode); ?>" name="couponCode" id="couponCode" class="coupon-input">
									<button type="submit" class="coupon-apply-btn">Apply</button>
								</div>
							</div>
						</form>

						<div class="coupondata"></div>
						
						<!-- Show All Coupons Toggle List -->
						<?php if (!empty($coupons)) { ?>
							<div class="mt-2 text-right">
								<button id="showCouponsBtn" class="show-all-coupons-trigger ml-auto">
									Show All Coupons <i class="fa-solid fa-chevron-down"></i>
								</button>
							</div>
							
							<div class="all_copouns" style="display:none;">
								<ul class="coupon-list">
									<?php foreach ($coupons as $coupon) { ?>
										<li class="coupon-item">
											<div class="coupon-item-card">
												<div>
													<div class="coupon-item-code"><?= htmlspecialchars(strlen($coupon['CouponCode']) > 15 ? substr($coupon['CouponCode'], 0, 15) . '...' : $coupon['CouponCode']); ?></div>
													<div class="coupon-item-lbl">Exclusive Code</div>
												</div>
												<button type="button" class="selectCouponBtn" data-coupon-code="<?= htmlspecialchars($coupon['CouponCode']); ?>">Apply</button>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>
					</div>

					<!-- Hidden Elements to preserve footer.php .updateCartbtn triggers -->
					<div class="d-none">
						<button class="btn updateCartbtn"></button>
					</div>
				</div>

				<!-- Right Column: Order Summary Card -->
				<div class="col-lg-4 col-12">
					<div class="sidebar-checkout-card">
						<h4 class="sidebar-card-title">Order Summary</h4>
						
						<!-- Summary Table -->
						<table class="table order-summary-table">
							<tbody>
								<tr>
									<td>Subtotal (<?php echo count($cart); ?> <?php echo count($cart) == 1 ? 'item' : 'items'; ?>)</td>
									<th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->subtotal, 2); ?></th>
								</tr>
								
								<?php if ($isShippingEnabled) { ?>
									<tr>
										<td>Shipping</td>
										<th>
											<?php
											if ($CartTotals->shippingCost == 0) {
												echo "<span style='color: var(--accent-green); font-weight: bold;'>Free</span>";
											} else {
												echo $all_setting_data['currency'] . number_format($CartTotals->shippingCost, 2);
											}
											?>
										</th>
									</tr>
								<?php } ?>

								<?php if ($isTaxEnabled) { ?>
									<tr>
										<td>Tax</td>
										<th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->tax, 2); ?></th>
									</tr>
								<?php } ?>

								<?php if ($CartTotals->DiscountPrice > 0) { ?>
									<tr class="Discount">
										<td>Discount</td>
										<th>-<?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->DiscountPrice, 2); ?></th>
									</tr>
								<?php } ?>
								
								<tr class="total">
									<td>Total</td>
									<th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->totalWithShipping, 2); ?></th>
								</tr>
							</tbody>
						</table>

						<!-- Discount Saving Notification inside Order Summary -->
						<?php if ($CartTotals->DiscountPrice > 0) { ?>
							<div class="savings-notification">
								You saved <?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->DiscountPrice, 2); ?> on this order
							</div>
						<?php } ?>

						<!-- Checkout CTA Actions -->
						<div class="checkout-action-buttons">
							<a href="<?php echo base_url('checkout'); ?>" class="checkout-primary-btn">
								<i class="fa-solid fa-lock" style="font-size: 13px;"></i> Proceed to Checkout
							</a>
							
							<button type="button" class="checkout-paypal-btn">
								Pay with <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" style="height: 18px; margin-left: 4px; vertical-align: middle;">
							</button>
						</div>

						<!-- Secure Checkout Trust Badges -->
						<div class="trust-badges-grid">
							<div class="trust-badge-item">
								<div class="trust-badge-icon">
									<i class="fa-solid fa-shield-halved"></i>
								</div>
								<div class="trust-badge-texts">
									<h5>Secure Payments</h5>
									<p>100% secure checkout</p>
								</div>
							</div>
							<div class="trust-badge-item">
								<div class="trust-badge-icon">
									<i class="fa-solid fa-rotate-left"></i>
								</div>
								<div class="trust-badge-texts">
									<h5>Easy Returns</h5>
									<p>Within 30 days of delivery</p>
								</div>
							</div>
							<div class="trust-badge-item">
								<div class="trust-badge-icon">
									<i class="fa-solid fa-truck-fast"></i>
								</div>
								<div class="trust-badge-texts">
									<h5>Free Delivery</h5>
									<p>On orders over $100</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<?php } else { ?>
			
			<!-- Redesigned Empty Cart State Layout -->
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8 col-12">
					<div class="empty-cart-card">
						<!-- Premium custom SVG empty cart illustration -->
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="160" height="160" class="mb-4 d-inline-block">
							<circle cx="100" cy="100" r="80" fill="#F5F2EE" />
							<!-- Potted plant on left -->
							<path d="M55,120 L65,120 L62,135 L58,135 Z" fill="#8C4E2D" />
							<path d="M60,119 C55,108 50,112 52,118 C48,110 44,115 48,120 C54,120 58,120 60,119 Z" fill="#1D9B5E" opacity="0.8" />
							<path d="M60,119 C65,108 70,112 68,118 C72,110 76,115 72,120 C66,120 62,120 60,119 Z" fill="#1D9B5E" />
							<!-- Cardboard boxes on right -->
							<polygon points="125,125 145,120 145,135 125,140" fill="#D7C4B7" />
							<polygon points="125,125 145,120 135,115 115,120" fill="#E8DCD3" />
							<polygon points="115,120 125,125 125,140 115,135" fill="#C5B1A2" />
							<polygon points="140,110 155,107 155,120 140,123" fill="#D7C4B7" opacity="0.9" />
							<polygon points="140,110 155,107 148,103 133,106" fill="#E8DCD3" opacity="0.9" />
							<polygon points="133,106 140,110 140,123 133,119" fill="#C5B1A2" opacity="0.9" />
							<!-- Basket frame -->
							<path d="M75,80 L80,105 L120,105 L128,75 L75,75 Z" fill="none" stroke="#2A2421" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M70,70 L75,75 L130,75 L135,90" fill="none" stroke="#2A2421" stroke-width="3" stroke-linecap="round" />
							<line x1="88" y1="105" x2="88" y2="125" stroke="#2A2421" stroke-width="3" />
							<line x1="112" y1="105" x2="112" y2="125" stroke="#2A2421" stroke-width="3" />
							<circle cx="88" cy="128" r="8" fill="#FFFFFF" stroke="#2A2421" stroke-width="3" />
							<circle cx="88" cy="128" r="3" fill="#2A2421" />
							<circle cx="112" cy="128" r="8" fill="#FFFFFF" stroke="#2A2421" stroke-width="3" />
							<circle cx="112" cy="128" r="3" fill="#2A2421" />
						</svg>
						
						<h3 class="empty-cart-title">Your shopping cart is empty</h3>
						<p class="empty-cart-desc">Before you proceed to checkout, you must add some product items to your shopping cart. You'll find a lot of interesting furniture and decor on our shop catalog.</p>
						
						<a href="<?php echo base_url('product'); ?>" class="empty-cart-btn">
							Continue Shopping <i class="fa-solid fa-arrow-right"></i>
						</a>
					</div>
				</div>
			</div>

			<!-- Dynamic live product recommendations column ("You may like") -->
			<div class="row justify-content-center mt-4">
				<div class="col-lg-6 col-md-8 col-12">
					<div class="recommendations-sidebar">
						<h4 class="recommendations-title">
							<i class="fa-solid fa-wand-magic-sparkles" style="color: var(--primary-color);"></i> You may like
						</h4>
						
						<div class="recommendations-list">
							<?php
							$ProductModel = new \App\Models\Productmodel();
							$recommendedProducts = $ProductModel->where('ProductLive', 1)->orderBy('ProductID', 'DESC')->limit(3)->findAll();
							
							if (!empty($recommendedProducts)) {
								foreach ($recommendedProducts as $recPrd) {
									$recImages = json_decode($recPrd['ProductImage']);
									$recImgUrl = !empty($recImages) 
										? base_url('admin/public/assets/img/product_images/' . $recImages[0]) 
										: base_url('admin/public/assets/img/product_images/18.jpg');
									
									$recPrice = $recPrd['Sale_ProductPrice'] ?? $recPrd['ProductPrice'] ?? 0;
									$recOldPrice = $recPrd['ProductPrice'] ?? 0;
									?>
									<div class="rec-item">
										<a href="<?php echo base_url($recPrd['slug'] . "/" . 'product_detail/' . base64_encode($recPrd['ProductID'])); ?>" class="rec-img-wrap">
											<img src="<?php echo $recImgUrl; ?>" alt="<?php echo htmlspecialchars($recPrd['ProductName']); ?>">
										</a>
										
										<div class="rec-details">
											<h5 class="rec-name">
												<a href="<?php echo base_url($recPrd['slug'] . "/" . 'product_detail/' . base64_encode($recPrd['ProductID'])); ?>">
													<?php echo $recPrd['ProductName']; ?>
												</a>
											</h5>
											
											<div class="rec-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<span>(128)</span>
											</div>
											
											<div class="rec-price">
												<span class="curr-price"><?php echo $all_setting_data['currency']; ?><?php echo number_format($recPrice, 2); ?></span>
												<?php if ($recOldPrice > $recPrice) { ?>
													<span class="old-price"><?php echo $all_setting_data['currency']; ?><?php echo number_format($recOldPrice, 2); ?></span>
												<?php } ?>
											</div>
										</div>
										
										<div class="rec-action">
											<form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST" style="margin: 0;">
												<input type="hidden" name="productId" value="<?php echo $recPrd['ProductID']; ?>">
												<input type="hidden" name="quantity" value="1">
												<?php if ($recPrd['ProductType'] != 2) { ?>
													<input type="hidden" name="price" value="<?php echo $recPrd['ProductPrice']; ?>">
												<?php } else {
													$variations = new App\Models\Variationmodel();
													$varia_dt = $variations->where('ProductID', $recPrd['ProductID'])->first();
													$pricearr = $varia_dt['Sale_VariationPrice'] ?? $varia_dt['VariationPrice'];
													?>
													<input type="hidden" name="price" value="<?php echo $pricearr; ?>">
													<input type="hidden" name="variationId" value="<?php echo $varia_dt['VariationID']; ?>">
												<?php } ?>
												<button type="submit" class="rec-add-btn">
													<i class="fa-solid fa-cart-plus"></i> Add
												</button>
											</form>
										</div>
									</div>
									<?php
								}
							} else {
								echo "<p class='text-muted text-center'>No recommendations available.</p>";
							}
							?>
						</div>
						
						<div class="text-center mt-4">
							<a href="<?php echo base_url('product'); ?>" class="rec-view-more">
								View All Products <i class="fa-solid fa-arrow-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			
		<?php } ?>
		
	</div>
</div>

<?= $this->include('footer') ?>

<!-- Custom Action Event Listeners & Cart Sync Scripts -->
<script>
$(document).ready(function() {
	// Show All Coupons slide toggle action
	$('#showCouponsBtn').on('click', function(e) {
		e.preventDefault();
		$('.all_copouns').slideToggle(300); 
		$(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
	});

	// Select and apply coupon click action
	$(document).on('click', '.selectCouponBtn', function(e) {
		e.preventDefault();
		var couponCode = $(this).data('coupon-code');
		$('#couponCode').val(couponCode); 
		$('.all_copouns').slideUp(200); 
		$('#apllyCouponForm').submit(); 
	});

	// Remove coupon action
	$('.removeCoupon').on('click', function(e) {
		e.preventDefault();
		$('#couponCode').val(''); 
		$('#apllyCouponForm').show(); 
		$('#removeCouponForm').hide(); 
	});

	// debounce helper to auto-commit cart quantity changes to the server session
	var cartUpdateDebounce = null;
	$(document).on('click', '.btn-number', function() {
		if (cartUpdateDebounce !== null) {
			clearTimeout(cartUpdateDebounce);
		}
		cartUpdateDebounce = setTimeout(function() {
			$(".updateCartbtn").trigger("click");
		}, 800); // Debounce of 800ms
	});
});
</script>
