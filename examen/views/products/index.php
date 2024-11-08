<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../../app/ProductsController.php";

$productsController = new ProductsController();

$producto = $productsController->getBySlug($_GET['slug']);



  include "../../app/config.php";

?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <?php include "../layouts/head.php" ?>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    
    <!-- [ Pre-loader ] End --> 
    <?php include "../layouts/sidebar.php" ?> 
    <?php include "../layouts/navbar.php" ?>
    
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                  <li class="breadcrumb-item" aria-current="page">Products</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Products</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ sample-page ] start -->
          <div class="col-sm-12">
            <div class="ecom-wrapper">
              <div class="offcanvas-xxl offcanvas-start ecom-offcanvas" tabindex="-1" id="offcanvas_mail_filter">
                <div class="offcanvas-body p-0 sticky-xxl-top">
                  <div id="ecom-filter" class="show collapse collapse-horizontal">
                    <div class="ecom-filter">
                      <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <h5>Filter</h5>
                          <a
                            href="#"
                            class="avtar avtar-s btn-link-danger btn-pc-default"
                            data-bs-dismiss="offcanvas"
                            data-bs-target="#offcanvas_mail_filter"
                          >
                            <i class="ti ti-x f-20"></i>
                          </a>
                        </div>
                        <div class="scroll-block">
                          <div class="card-body">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item border-0 px-0 py-2">
                                <a class="btn border-0 px-0 text-start w-100 pb-0" data-bs-toggle="collapse" href="#filtercollapse1">
                                  <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                  Gender
                                </a>
                                <div class="collapse show" id="filtercollapse1">
                                  <div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="genderfilter1" value="option1" />
                                      <label class="form-check-label" for="genderfilter1">Male</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="genderfilter2" value="option2" />
                                      <label class="form-check-label" for="genderfilter2">Female</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="genderfilter3" value="option3" />
                                      <label class="form-check-label" for="genderfilter3">Kids</label>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li class="list-group-item border-0 px-0 py-2">
                                <a class="btn border-0 px-0 text-start w-100 pb-0" data-bs-toggle="collapse" href="#filtercollapse2">
                                  <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                  Categories
                                </a>
                                <div class="collapse show" id="filtercollapse2">
                                  <div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter1" value="option1" />
                                      <label class="form-check-label" for="categoryfilter1">All</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter2" value="option2" />
                                      <label class="form-check-label" for="categoryfilter2">Electronics</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter3" value="option3" />
                                      <label class="form-check-label" for="categoryfilter3">Fashion</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter4" value="option1" />
                                      <label class="form-check-label" for="categoryfilter4">Kitchen</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter5" value="option2" />
                                      <label class="form-check-label" for="categoryfilter5">Books</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter6" value="option3" />
                                      <label class="form-check-label" for="categoryfilter6">Toys</label>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li class="list-group-item border-0 px-0 py-2">
                                <a class="btn border-0 px-0 text-start w-100 pb-2" data-bs-toggle="collapse" href="#filtercollapse3">
                                  <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                  Colors
                                </a>
                                <div class="collapse show" id="filtercollapse3">
                                  <div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-primary"></i>
                                    </div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-secondary"></i>
                                    </div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-danger"></i>
                                    </div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-success"></i>
                                    </div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-warning"></i>
                                    </div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-info"></i>
                                    </div>
                                    <div class="form-check form-check-inline color-checkbox">
                                      <input class="form-check-input" type="checkbox" />
                                      <i class="fas fa-circle text-dark"></i>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            
                              <li class="list-group-item border-0 px-0 py-2">
                                <a href="#" class="btn btn-light-danger w-100">Clear All</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ecom-content">
                <div class="d-sm-flex align-items-center mb-4">
                  <ul class="list-inline me-auto my-1">
                    <li class="list-inline-item">
                      <form class="form-search">
                        <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search Products" />
                      </form>
                    </li>
                  </ul>
                  <ul class="list-inline ms-auto my-1">
                    <li class="list-inline-item">
                      <select class="form-select">
                        <option>Price: High To Low</option>
                        <option>Price: Low To High</option>
                        <option>Popularity</option>
                        <option>Discount</option>
                        <option>Fresh Arrivals</option>
                      </select>
                    </li>
                    <li class="list-inline-item align-bottom">
                      <a
                        href="#"
                        class="d-xxl-none btn btn-link-secondary"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvas_mail_filter"
                      >
                        <i class="ti ti-filter f-16"></i> Filter
                      </a>
                      <a
                        href="#"
                        class="d-none d-xxl-inline-flex btn btn-link-secondary"
                        data-bs-toggle="collapse"
                        data-bs-target="#ecom-filter"
                      >
                        <i class="ti ti-filter f-16"></i> Filter
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-xl-4">
                    <div class="card product-card">
                      <div class="card-img-top">
                        <a href="ecom_product-details.html">
                        <img src="<?= $producto->cover ?>" class="d-block w-100" alt="...">
                        </a>
                        <div class="card-body position-absolute end-0 top-0">
                          <div class="form-check prod-likes">
                            <input type="checkbox" class="form-check-input" />
                            <i data-feather="heart" class="prod-likes-icon"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <a href="ecom_product-details.html">
                          <p class="prod-content mb-0 text-muted"><?= $producto->name ?></p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                          <h4 class="mb-0 text-truncate"
                            ><b>$299.00</b> <span class="text-sm text-muted f-w-400 text-decoration-line-through">$399.00</span></h4
                          >
                          <div class="d-inline-flex align-items-center">
                            <i class="ph-duotone ph-star text-warning me-1"></i>
                            4.5 <small class="text-muted">/ 5</small>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <a
                              href="#"
                              class="avtar avtar-s btn-link-secondary btn-prod-card"
                              data-bs-toggle="offcanvas"
                              data-bs-target="#productOffcanvas"
                            >
                              <i class="ph-duotone ph-eye f-18"></i>
                            </a>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="d-grid">
                              <button class="btn btn-link-secondary btn-prod-card">Add to cart</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          
         
                  
                
              
    
                  
                </div>
              </div> 
            </div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
    
    <!-- [ Main Content ] end -->
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>