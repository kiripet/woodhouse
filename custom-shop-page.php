<?php
/**
 * Template Name: Custom Shop with Categories
 */
get_header();
?>

<div class="page-content bg-light">
    <?php
        // Get the uploaded header image from the customizer
        $shop_header_image = get_theme_mod( 'shop_header_image' );

        // Fallback to a default image if none is uploaded
        $default_image = get_template_directory_uri() . '/images/background/bg1.jpg'; // Path to the default image
        $header_image_url = $shop_header_image ? $shop_header_image : $default_image;
    ?>
    <!--Banner Start-->
    <div class="dz-bnr-inr bg-secondary overlay-black-light" style="background-image:url(<?php echo esc_url( $header_image_url ); ?>);">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1><?php woocommerce_page_title(); ?></h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
                        <li class="breadcrumb-item"><?php woocommerce_page_title(); ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--Banner End-->

    <section class="content-inner-3 pt-3 z-index-unset">
        <div class="container-fluid">
            <div class="row mt-xl-2 mt-0">
                <?php require_once get_template_directory() . '/classes/class-woocommerce-custom-filters.php'; ?>
                <div class="col-80 col-xl-9">
                    <h4 class="mb-3">Category</h4>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="swiper category-swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    // Ensure WooCommerce functions are available
                                    if ( ! function_exists( 'wc_get_products' ) ) {
                                        return;
                                    }

                                    // Get WooCommerce product categories
                                    $args = array(
                                        'taxonomy'   => 'product_cat',
                                        'hide_empty' => true, // Set to false if you want to show empty categories
                                    );
                                    $categories = get_terms( $args );

                                    // Check if categories are available
                                    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
                                        foreach ( $categories as $category ) :
                                            // Get the category thumbnail ID
                                            $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                                            $category_image_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="shop-card">
                                                    <div class="dz-media rounded">
                                                        <img src="<?php echo esc_url( $category_image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>">
                                                    </div>
                                                    <div class="dz-content">
                                                        <h6 class="title">
                                                            <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                                                                <?php echo esc_html( $category->name ); ?>
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p><?php _e( 'No categories found.', 'text-domain' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-wrapper border-top p-t20">
                                        <div class="filter-left-area">								
                                            <ul class="filter-tag">
                                                <li>
                                                    <a href="javascript:void(0);" class="tag-btn">Dresses 
                                                        <i class="icon feather icon-x tag-close"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="tag-btn">Tops
                                                        <i class="icon feather icon-x tag-close"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="tag-btn">Outerwear 
                                                        <i class="icon feather icon-x tag-close"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><?php woocommerce_result_count(); ?></span>
                                        </div>
                                        <div class="filter-right-area">
                                            <a href="javascript:void(0);" class="panel-btn">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="20" height="20"><g id="Layer_28" data-name="Layer 28"><path d="M2.54,5H15v.5A1.5,1.5,0,0,0,16.5,7h2A1.5,1.5,0,0,0,20,5.5V5h2.33a.5.5,0,0,0,0-1H20V3.5A1.5,1.5,0,0,0,18.5,2h-2A1.5,1.5,0,0,0,15,3.5V4H2.54a.5.5,0,0,0,0,1ZM16,3.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path><path d="M22.4,20H18v-.5A1.5,1.5,0,0,0,16.5,18h-2A1.5,1.5,0,0,0,13,19.5V20H2.55a.5.5,0,0,0,0,1H13v.5A1.5,1.5,0,0,0,14.5,23h2A1.5,1.5,0,0,0,18,21.5V21h4.4a.5.5,0,0,0,0-1ZM17,21.5a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5v-2a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5Z"></path><path d="M8.5,15h2A1.5,1.5,0,0,0,12,13.5V13H22.45a.5.5,0,1,0,0-1H12v-.5A1.5,1.5,0,0,0,10.5,10h-2A1.5,1.5,0,0,0,7,11.5V12H2.6a.5.5,0,1,0,0,1H7v.5A1.5,1.5,0,0,0,8.5,15ZM8,11.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path></g></svg>
                                                Filter
                                            </a>
                                            <div class="form-group">
                                                <select class="default-select">
                                                    <option>Latest</option>
                                                    <option>Popularity</option>
                                                    <option>Average rating</option>
                                                    <option>Latest</option>
                                                    <option>Low to high</option>
                                                    <option>high to Low</option>
                                                </select>
                                            </div>
                                            <div class="form-group Category">
                                                <select class="default-select">
                                                    <option>Products</option>
                                                    <option>9 Products</option>
                                                    <option>12 Products</option>
                                                    <option>14 Products</option>
                                                    <option>18 Products</option>
                                                    <option>24 Products</option>
                                                </select>
                                            </div>
                                            <div class="shop-tab">
                                                <ul class="nav" role="tablist" id="dz-shop-tab">
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#tab-list-list" class="nav-link active" id="tab-list-list-btn" data-bs-toggle="pill" data-bs-target="#tab-list-list" role="tab" aria-controls="tab-list-list" aria-selected="true">
                                                            <svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_121_190)">
                                                                <path d="M42.667 373.333H96C119.564 373.333 138.667 392.436 138.667 416V469.333C138.667 492.898 119.564 512 96 512H42.667C19.103 512 0 492.898 0 469.333V416C0 392.436 19.103 373.333 42.667 373.333Z" fill="black"></path>
                                                                <path d="M42.667 186.667H96C119.564 186.667 138.667 205.77 138.667 229.334V282.667C138.667 306.231 119.564 325.334 96 325.334H42.667C19.103 325.333 0 306.231 0 282.667V229.334C0 205.769 19.103 186.667 42.667 186.667Z" fill="black"></path>
                                                                <path d="M42.667 0H96C119.564 0 138.667 19.103 138.667 42.667V96C138.667 119.564 119.564 138.667 96 138.667H42.667C19.103 138.667 0 119.564 0 96V42.667C0 19.103 19.103 0 42.667 0Z" fill="black"></path>
                                                                <path d="M230.565 373.333H468.437C492.682 373.333 512.336 392.436 512.336 416V469.333C512.336 492.897 492.682 512 468.437 512H230.565C206.32 512 186.666 492.898 186.666 469.333V416C186.667 392.436 206.32 373.333 230.565 373.333Z" fill="black"></path>
                                                                <path d="M230.565 186.667H468.437C492.682 186.667 512.336 205.77 512.336 229.334V282.667C512.336 306.231 492.682 325.334 468.437 325.334H230.565C206.32 325.334 186.666 306.231 186.666 282.667V229.334C186.667 205.769 206.32 186.667 230.565 186.667Z" fill="black"></path>
                                                                <path d="M230.565 0H468.437C492.682 0 512.336 19.103 512.336 42.667V96C512.336 119.564 492.682 138.667 468.437 138.667H230.565C206.32 138.667 186.666 119.564 186.666 96V42.667C186.667 19.103 206.32 0 230.565 0Z" fill="black"></path>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_121_190">
                                                                <rect width="512" height="512" fill="white"></rect>
                                                                </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#tab-list-column" class="nav-link" id="tab-list-column-btn" data-bs-toggle="pill" data-bs-target="#tab-list-column" role="tab" aria-controls="tab-list-column" aria-selected="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                                                <g>
                                                                    <path d="M85.333,0h64c47.128,0,85.333,38.205,85.333,85.333v64c0,47.128-38.205,85.333-85.333,85.333h-64   C38.205,234.667,0,196.462,0,149.333v-64C0,38.205,38.205,0,85.333,0z"></path>
                                                                    <path d="M362.667,0h64C473.795,0,512,38.205,512,85.333v64c0,47.128-38.205,85.333-85.333,85.333h-64   c-47.128,0-85.333-38.205-85.333-85.333v-64C277.333,38.205,315.538,0,362.667,0z"></path>
                                                                    <path d="M85.333,277.333h64c47.128,0,85.333,38.205,85.333,85.333v64c0,47.128-38.205,85.333-85.333,85.333h-64   C38.205,512,0,473.795,0,426.667v-64C0,315.538,38.205,277.333,85.333,277.333z"></path>
                                                                    <path d="M362.667,277.333h64c47.128,0,85.333,38.205,85.333,85.333v64C512,473.795,473.795,512,426.667,512h-64   c-47.128,0-85.333-38.205-85.333-85.333v-64C277.333,315.538,315.538,277.333,362.667,277.333z"></path>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#tab-list-grid" class="nav-link" id="tab-list-grid-btn" data-bs-toggle="pill" data-bs-target="#tab-list-grid" role="tab" aria-controls="tab-list-grid" aria-selected="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512"><g>
                                                                <path d="M42.667,373.333H96c23.564,0,42.667,19.103,42.667,42.667v53.333C138.667,492.898,119.564,512,96,512H42.667   C19.103,512,0,492.898,0,469.333V416C0,392.436,19.103,373.333,42.667,373.333z"></path>
                                                                <path d="M416,373.333h53.333C492.898,373.333,512,392.436,512,416v53.333C512,492.898,492.898,512,469.333,512H416   c-23.564,0-42.667-19.102-42.667-42.667V416C373.333,392.436,392.436,373.333,416,373.333z"></path>
                                                                <path d="M42.667,186.667H96c23.564,0,42.667,19.103,42.667,42.667v53.333c0,23.564-19.103,42.667-42.667,42.667H42.667   C19.103,325.333,0,306.231,0,282.667v-53.333C0,205.769,19.103,186.667,42.667,186.667z"></path>
                                                                <path d="M416,186.667h53.333c23.564,0,42.667,19.103,42.667,42.667v53.333c0,23.564-19.102,42.667-42.667,42.667H416   c-23.564,0-42.667-19.103-42.667-42.667v-53.333C373.333,205.769,392.436,186.667,416,186.667z"></path>
                                                                <path d="M42.667,0H96c23.564,0,42.667,19.103,42.667,42.667V96c0,23.564-19.103,42.667-42.667,42.667H42.667   C19.103,138.667,0,119.564,0,96V42.667C0,19.103,19.103,0,42.667,0z"></path>
                                                                <path d="M229.333,373.333h53.333c23.564,0,42.667,19.103,42.667,42.667v53.333c0,23.564-19.103,42.667-42.667,42.667h-53.333   c-23.564,0-42.667-19.102-42.667-42.667V416C186.667,392.436,205.769,373.333,229.333,373.333z"></path>
                                                                <path d="M229.333,186.667h53.333c23.564,0,42.667,19.103,42.667,42.667v53.333c0,23.564-19.103,42.667-42.667,42.667h-53.333   c-23.564,0-42.667-19.103-42.667-42.667v-53.333C186.667,205.769,205.769,186.667,229.333,186.667z"></path>
                                                                <path d="M229.333,0h53.333c23.564,0,42.667,19.103,42.667,42.667V96c0,23.564-19.103,42.667-42.667,42.667h-53.333   c-23.564,0-42.667-19.103-42.667-42.667V42.667C186.667,19.103,205.769,0,229.333,0z"></path>
                                                                <path d="M416,0h53.333C492.898,0,512,19.103,512,42.667V96c0,23.564-19.102,42.667-42.667,42.667H416   c-23.564,0-42.667-19.103-42.667-42.667V42.667C373.333,19.103,392.436,0,416,0z"></path>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 tab-content shop-" id="pills-tabContent">
                                            <div class="tab-pane fade " id="tab-list-list" role="tabpanel" aria-labelledby="tab-list-list-btn">
                                                <div class="row">
                                                    <?php
                                                    // Ensure WooCommerce functions are available
                                                    if ( ! function_exists( 'wc_get_products' ) ) {
                                                        return;
                                                    }

                                                    // Get WooCommerce products
                                                    $args = array(
                                                        'status' => 'publish',
                                                        'limit' => -1, // Retrieve all products
                                                    );
                                                    $products = wc_get_products( $args );

                                                    // Loop through products and display them
                                                    foreach ( $products as $product ) :
                                                        // Get product prices and sale information
                                                        $regular_price = $product->get_regular_price();
                                                        $sale_price    = $product->get_sale_price();
                                                        $price         = $product->get_price();
                                                        $on_sale       = $product->is_on_sale();

                                                        // Calculate discount percentage if on sale
                                                        if ( $on_sale && $regular_price > 0 ) {
                                                            $discount_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
                                                        } else {
                                                            $discount_percentage = null;
                                                        }

                                                        // Get product image URL
                                                        $product_image_id = $product->get_image_id();
                                                        $product_image_url = wp_get_attachment_image_url( $product_image_id, 'full' );

                                                        // Get product categories
                                                        $categories = $product->get_category_ids();
                                                        ?>
                                                    <div class="col-md-12 col-sm-12 col-xxxl-6">
                                                        <div class="dz-shop-card style-2">
                                                            <div class="dz-media">
                                                                <img src="<?php echo esc_url( $product_image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>">
                                                            </div>
                                                            <div class="dz-content">
                                                                <div class="dz-header">
                                                                    <div>
                                                                        <h4 class="title mb-0">
                                                                            <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
                                                                                <?php echo esc_html( $product->get_name() ); ?>
                                                                            </a>
                                                                        </h4>
                                                                        <ul class="dz-tags">
                                                                            <?php
                                                                            // Get the product categories
                                                                            $category_links = array();

                                                                            // Loop through the product categories and store in an array
                                                                            foreach ( $categories as $category_id ) {
                                                                                $category = get_term( $category_id, 'product_cat' );
                                                                                $category_links[] = '<li><a href="' . esc_url( get_term_link( $category_id, 'product_cat' ) ) . '">' . esc_html( $category->name ) . '</a></li>';
                                                                            }

                                                                            // Join categories with a comma and space
                                                                            echo implode( ',', $category_links );
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="review-num">
                                                                        <ul class="dz-rating">
                                                                            <?php
                                                                            // Get average rating and display it as stars
                                                                            $average_rating = $product->get_average_rating();
                                                                            for ( $i = 0; $i < 5; $i++ ) {
                                                                                if ( $i < $average_rating ) {
                                                                                    echo '<li class="star-fill"><i class="flaticon-star-1"></i></li>';
                                                                                } else {
                                                                                    echo '<li><i class="flaticon-star-1"></i></li>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                        <span><a href="javascript:void(0);"> <?php echo esc_html( $product->get_review_count() ); ?> Reviews</a></span>
                                                                    </div>
                                                                </div>
                                                                <div class="dz-body">
                                                                    <div class="dz-rating-box">
                                                                        <div>
                                                                        <p class="dz-para">
                                                                            <?php
                                                                            // Get product short description and allow HTML
                                                                            echo wp_kses_post( $product->get_short_description() );
                                                                            ?>
                                                                        </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rate">
                                                                        <div class="d-flex align-items-center mb-xl-3 mb-2">
                                                                            <div class="meta-content m-0">
                                                                                <span class="price-name">Price</span>
                                                                                <span class="price">
                                                                                    <?php
                                                                                    // Get the raw price and force it to display with two decimal places
                                                                                    $price = number_format( $product->get_price(), 2 ); // Format the price with two decimal places
                                                                                    $currency_symbol = get_woocommerce_currency_symbol(); // Get the currency symbol

                                                                                    // Concatenate the currency symbol and formatted price
                                                                                    echo esc_html( $currency_symbol . $price );
                                                                                    ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <a href="<?php echo esc_url( '?add-to-cart=' . $product->get_id() ); ?>" class="btn btn-secondary btn-md btn-icon">
                                                                                <i class="icon feather icon-shopping-cart d-md-none d-block"></i>
                                                                                <span class="d-md-block d-none">Add to cart</span>
                                                                            </a>
                                                                            <div class="bookmark-btn style-1">
                                                                                <input class="form-check-input" type="checkbox" id="favoriteCheck<?php echo esc_attr( $product->get_id() ); ?>">
                                                                                <label class="form-check-label" for="favoriteCheck<?php echo esc_attr( $product->get_id() ); ?>">
                                                                                    <i class="fa-solid fa-heart"></i>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab-list-column" role="tabpanel" aria-labelledby="tab-list-column-btn">
                                                <div class="row gx-xl-4 g-3 mb-xl-0 mb-md-0 mb-3">
                                                    <div class="row">
                                                        <?php
                                                        // Ensure WooCommerce functions are available
                                                        if ( ! function_exists( 'wc_get_products' ) ) {
                                                            return;
                                                        }

                                                        // Get WooCommerce products
                                                        $args = array(
                                                            'status' => 'publish',
                                                            'limit' => -1, // Retrieve all products
                                                        );
                                                        $products = wc_get_products( $args );

                                                        // Loop through each product and display it
                                                        foreach ( $products as $product ) : ?>
                                                            <div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
                                                                <div class="shop-card style-1">
                                                                    <div class="dz-media">
                                                                        <?php
                                                                        // Get product image URL
                                                                        $product_image_id = $product->get_image_id();
                                                                        $product_image_url = wp_get_attachment_image_url( $product_image_id, 'full' );
                                                                        ?>
                                                                        <img src="<?php echo esc_url( $product_image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>">
                                                                        <div class="shop-meta">
                                                                            <a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                                <i class="fa-solid fa-eye d-md-none d-block"></i>
                                                                                <span class="d-md-block d-none">Quick View</span>
                                                                            </a>
                                                                            <div class="btn btn-primary meta-icon dz-wishicon">
                                                                                <i class="icon feather icon-heart dz-heart"></i>
                                                                                <i class="icon feather icon-heart-on dz-heart-fill"></i>
                                                                            </div>
                                                                            <div class="btn btn-primary meta-icon dz-carticon">
                                                                                <i class="flaticon flaticon-basket"></i>
                                                                                <i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dz-content">
                                                                        <h5 class="title">
                                                                            <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
                                                                                <?php echo esc_html( $product->get_name() ); ?>
                                                                            </a>
                                                                        </h5>
                                                                        <h5 class="price">
                                                                            <?php echo wc_price( $product->get_price() ); ?>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="product-tag">
                                                                        <?php
                                                                        // Get regular and sale prices
                                                                        $regular_price = $product->get_regular_price();
                                                                        $sale_price = $product->get_sale_price();

                                                                        // Check if the sale price exists
                                                                        if ( ! empty( $sale_price ) && $sale_price < $regular_price ) {
                                                                            // Calculate discount percentage
                                                                            $discount_percentage = ( ( $regular_price - $sale_price ) / $regular_price ) * 100;

                                                                            // Format discount percentage to integer
                                                                            $discount_percentage = round( $discount_percentage );

                                                                            // Display discount badge
                                                                            echo '<span class="badge">Get ' . esc_html( $discount_percentage ) . '% Off</span>';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade active show" id="tab-list-grid" role="tabpanel" aria-labelledby="tab-list-grid-btn">
                                                <div class="row gx-xl-4 g-3">
                                                    <?php
                                                    // Ensure WooCommerce functions are available
                                                    if ( ! function_exists( 'wc_get_products' ) ) {
                                                        return;
                                                    }

                                                    // Get WooCommerce products
                                                    $args = array(
                                                        'status' => 'publish',
                                                        'limit' => -1, // Retrieve all products
                                                    );
                                                    $products = wc_get_products( $args );

                                                    // Loop through each product and display it
                                                    foreach ( $products as $product ) : ?>
                                                        <div class="col-6 col-xl-3 col-lg-4 col-md-4 col-sm-6 m-md-b15 m-b30">
                                                            <div class="shop-card style-1">
                                                                <div class="dz-media">
                                                                    <?php
                                                                    // Get product image URL
                                                                    $product_image_id = $product->get_image_id();
                                                                    $product_image_url = wp_get_attachment_image_url( $product_image_id, 'full' );
                                                                    ?>
                                                                    <img src="<?php echo esc_url( $product_image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>">
                                                                    <div class="shop-meta">
                                                                        <a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                            <i class="fa-solid fa-eye d-md-none d-block"></i>
                                                                            <span class="d-md-block d-none">Quick View</span>
                                                                        </a>
                                                                        <div class="btn btn-primary meta-icon dz-wishicon">
                                                                            <i class="icon feather icon-heart dz-heart"></i>
                                                                            <i class="icon feather icon-heart-on dz-heart-fill"></i>
                                                                        </div>
                                                                        <div class="btn btn-primary meta-icon dz-carticon">
                                                                            <i class="flaticon flaticon-basket"></i>
                                                                            <i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dz-content">
                                                                    <h5 class="title">
                                                                        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
                                                                            <?php echo esc_html( $product->get_name() ); ?>
                                                                        </a>
                                                                    </h5>
                                                                    <h5 class="price">
                                                                        <?php echo wc_price( $product->get_price() ); ?>
                                                                    </h5>
                                                                </div>
                                                                <div class="product-tag">
                                                                    <?php
                                                                    // Get regular and sale prices
                                                                    $regular_price = $product->get_regular_price();
                                                                    $sale_price = $product->get_sale_price();

                                                                    // Check if the sale price exists
                                                                    if ( ! empty( $sale_price ) && $sale_price < $regular_price ) {
                                                                        // Calculate discount percentage
                                                                        $discount_percentage = ( ( $regular_price - $sale_price ) / $regular_price ) * 100;

                                                                        // Format discount percentage to integer
                                                                        $discount_percentage = round( $discount_percentage );

                                                                        // Display discount badge
                                                                        echo '<span class="badge">Get ' . esc_html( $discount_percentage ) . '% Off</span>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row page mt-0">
                                        <div class="col-md-6">
                                            <p class="page-text">Showing 1–5 Of 50 Results</p>
                                        </div>
                                        <div class="col-md-6">
                                            <nav aria-label="Blog Pagination">
                                                <ul class="pagination style-1">
                                                    <li class="page-item"><a class="page-link prev" href="javascript:void(0);">Prev</a></li>
                                                    <li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item"><a class="page-link next" href="javascript:void(0);">Next</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php 
                get_footer();
                ?>
