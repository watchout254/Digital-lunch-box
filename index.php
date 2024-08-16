<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Lunchbox</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .bg-container {
        background: url('https://img.freepik.com/free-photo/plate-biryani-with-bunch-spices-it_505751-3812.jpg') no-repeat center center;
        background-size: cover;
        height: 100vh;
        color: white;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    .bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        /* Dark overlay to make text more readable */
    }

    .content {
        position: relative;
        z-index: 2;
    }

    .banner-heading {
        font-size: 3rem;
        font-weight: bold;
    }

    .banner-para {
        font-size: 1.5rem;
    }

    .banner-order-button {
        background-color: #ff5722;
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        margin: 0.5rem;
        cursor: pointer;
        text-decoration: none;
    }

    .banner-order-button:hover {
        background-color: #e64a19;
    }

    .navbar-logo {
        height: 40px;
        margin-right: 10px;
    }

    .wcu-section {
        background-color: #fff;
        padding: 2rem 0;
    }

    .wcu-card-image {
        max-height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .wcu-card-title {
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .wcu-card-description {
        font-size: 1rem;
    }

    .explore-menu-section {
        background-color: #f8f9fa;
        padding: 2rem 0;
    }

    .menu-card-image {
        max-height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .menu-card-title {
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .menu-card-link {
        font-size: 1rem;
        color: #007bff;
    }

    .healthy-food-section img,
    .healthy-food-section h1,
    .healthy-food-section p,
    .follow-us-section img,
    .footer-section img {
        max-width: 100%;
    }

    .healthy-food-image {
        width: 100%;
        height: auto;
    }

    .follow-us-icon-container {
        margin: 10px;
    }

    .follow-us-icon-container i {
        font-size: 2rem;
    }

    #get-help-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        text-align: center;
    }

    #get-help-icon:hover {
        background-color: #0056b3;
    }

    #chat-container {
        position: fixed;
        bottom: 70px;
        right: 20px;
        width: 300px;
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #chat-box {
        display: flex;
        flex-direction: column;
        height: 400px;
    }

    #chat-log {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
    }

    #user-input {
        border: none;
        padding: 10px;
        width: 80%;
        box-sizing: border-box;
    }

    #send-btn {
        border: none;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    #send-btn:hover {
        background-color: #0056b3;
    }


    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }

        .bg-container {
            padding: 20px;
        }

        .banner-heading {
            font-size: 2rem;
        }

        .banner-para {
            font-size: 1.25rem;
        }

        .wcu-card {
            margin-bottom: 20px;
        }

        .menu-card-container {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .navbar-nav {
            flex-direction: column;
        }

        .banner-heading {
            font-size: 1.5rem;
        }

        .banner-para {
            font-size: 1rem;
        }

        .banner-order-button {
            padding: 0.5rem 1rem;
        }

        .wcu-card-title,
        .menu-card-title {
            font-size: 1rem;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <h3><b>DIGITAL LUNCHBOX</b></h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" id="nav-link1" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link custom-nav-link" id="nav-link2" href="#sectionWcu">Why Choose Us?</a>
                <a class="nav-link custom-nav-link" id="nav-link3" href="#sectionExplore">Explore Menu</a>
                <a class="nav-link custom-nav-link" id="nav-link4" href="#sectionDeliveryPayments">Delivery &
                    Payments</a>
                <a class="nav-link custom-nav-link" id="nav-link5" href="order.php">Order now</a>
                <a class="nav-link custom-nav-link" id="nav-link-cart" href="cart.php">
                    <i class="fa-solid fa-cart-shopping"></i> <span id="cart-count">0</span>
                </a>
                <!--<a class="nav-link custom-nav-link" id="nav-link6" href="logout.php">Log Out</a>-->
                <a class="nav-link custom-nav-link" id="nav-link6" href="admin.php">Admin</a>

                <!--<div id="userDisplay" class="nav-link custom-nav-link user-display" onclick="openModal()">Username</div>-->
                <style>
                .user-display {
                    font-size: 1.5em;
                    font-weight: bold;
                    text-align: center;
                    margin-top: 0;
                    margin-left: 20px;
                    line-height: 1.5;
                    cursor: pointer;
                    /* Pointer cursor for user's name */
                }

                .nav-link {
                    display: flex;
                    align-items: center;
                    padding: 10px;
                }

                .menu-card {
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    overflow: hidden;
                    text-align: center;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .menu-card-image {
                    max-width: 100%;
                    height: auto;
                }

                .menu-card-title {
                    font-size: 1.5rem;
                    margin: 0.5rem 0;
                }

                .menu-card-link {
                    font-size: 1.2rem;
                    color: #333;
                    text-decoration: none;
                    display: block;
                    margin: 0.5rem 0;
                }

                .menu-card-stars {
                    color: #FFD700;

                    /* Gold color */
                    /* Modal styles */
                }

                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.6);
                    /* Semi-transparent background */
                    padding-top: 60px;
                }

                modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.6);
                    /* Semi-transparent background */
                    padding-top: 60px;
                }

                /* Modal content */
                .modal-content {
                    background-color: #fefefe;
                    margin: 5% auto;
                    padding: 20px;
                    border-radius: 10px;
                    /* Rounded corners */
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                    /* Drop shadow */
                    width: 80%;
                    max-width: 400px;
                    /* Maximum width */
                    text-align: center;
                    /* Center align content */
                }

                /* Close button */
                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                    color: black;
                    text-decoration: none;
                    cursor: pointer;
                }

                /* Logout button */
                .logout-btn {
                    background-color: #d9534f;
                    /* Bootstrap danger color */
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 1em;
                    transition: background-color 0.3s ease;
                    /* Smooth transition */
                }

                .logout-btn:hover {
                    background-color: #c9302c;
                    /* Darker red on hover */
                }

                .add-to-cart-btn {
                    background-color: #007bff;
                    color: white;
                    border: none;
                    padding: 10px;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 1em;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 10px auto;
                    transition: background-color 0.3s ease;
                }

                #nav-link-cart i {
                    color: red;
                    /* Cart icon color */
                    margin-right: 5px;
                    /* Add some space between the icon and the number */
                }

                #cart-count {
                    color: black;
                    /* Number color */
                    font-weight: bold;
                }

                .cookie-consent {
                    position: fixed;
                    bottom: 20px;
                    left: 20px;
                    right: 20px;
                    background-color: #333;
                    color: #fff;
                    padding: 15px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                    display: none;
                    z-index: 1000;
                }

                .cookie-consent button {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    margin-left: 20px;
                    cursor: pointer;
                    border-radius: 5px;
                }

                .cookie-consent button:hover {
                    background-color: #45a049;
                }
                </style>
            </div>
        </div>
    </nav>
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </div>


    <div class="bg-container">
        <div class="bg-overlay"></div>
        <div class="content">
            <h1 class="banner-heading">Digital Lunchbox</h1>
            <p class="banner-para">Exploring your taste buds</p>
            <div class="d-flex flex-row justify-content-center">
                <a href="order.php" class="banner-order-button">Order Now</a>
            </div>
        </div>
    </div>



    <div class="wcu-section pb-5 pt-5" id="sectionWcu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="wcu-heading">Why Choose Us?</h1>
                    <p class="wcu-para">We use both original recipes and classic versions of famous food items</p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="wcu-card p-3 mb-2">
                        <img src="https://logowik.com/content/uploads/images/food-service4537.jpg"
                            class="wcu-card-image" />
                        <h1 class="wcu-card-title">Food Service</h1>
                        <p class="wcu-card-description">Experience fine dining at the comfort of your home. All our
                            orders are carefully packed and arranged to give you nothing less than perfect.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="wcu-card p-3 mb-2">
                        <img src="https://cdn.dribbble.com/users/1700393/screenshots/15866159/media/ac942cba190f0eabddfc3b725be4958a.png?compress=1&resize=400x300&vertical=top"
                            class="wcu-card-image" />
                        <h1 class="wcu-card-title">Fresh Food</h1>
                        <p class="wcu-card-description">The Fresh Food group provides fresh-cut fruits and vegetables
                            directly picked from our partner farms so that you always get them tree to plate.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="wcu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-tdRmq9MEQVkUvhLZA7GxxhwHxlHkYw_MPQ&s"
                            class="wcu-card-image" />
                        <h1 class="wcu-card-title">Affordable Prices</h1>
                        <p class="wcu-card-description">We offer competitive and affordable prices to make sure you
                            don't have to worry about your pocket when enjoying our meals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="explore-menu-section pb-5 pt-5" id="sectionExplore">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="explore-menu-heading">Explore Menu</h1>
                    <p class="explore-menu-para">Find all our exclusive menus, specials and offers only on our
                        website.</p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSsaz3hkdie6gzWeFBOuhE3nFozIykz72Vtw&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Kienyeji + Fish wet fry with cornmeal/rice</h1>
                        <a class="menu-card-link">KES 350/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn"
                            onclick="addToCart('Kienyeji + Fish wet fry with cornmeal/rice', 350)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRr8sEjxL1baluyLvGPEIBXGXJ2G83iUK3fEQ&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Beef dry fry with pasta</h1>
                        <a class="menu-card-link">KES 300/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Beef Dry with pasta', 300)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKJ2GLvhny0_A1bC1gK_sCCj9lPoJKHHFXZg&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Githeri with potatoes diced avocado</h1>
                        <a class="menu-card-link">KES 200/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('githeri with potatoes', 200)"> Add to Cart
                            <i class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOOf9VSOdHslA2NHV6FHY34cgPgggwpoKMkQ&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Marinated Chicken with vegetable rice</h1>
                        <a class="menu-card-link">KES 600/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn"
                            onclick="addToCart('Marinated chicken with vegetable rice', 600)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://i0.wp.com/gwenjikoni.com/wp-content/uploads/2022/09/20220807_205107.jpg?resize=768%2C1024"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Swahili Pilau with Guacamole</h1>
                        <a class="menu-card-link">KES 450/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Swahili pilau with guacamole', 450)"> Add to
                            Cart <i class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>SPECIAL OFFER</b></h3>
                        <img src="https://www.indianhealthyrecipes.com/wp-content/uploads/2021/12/chicken-biryani.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Chicken Biryani + Guacamole</h1>
                        <a class="menu-card-link">KES 750/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Chicken Biryani + Guacamole', 750)"> Add to
                            Cart <i class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>SPECIAL OFFER</b></h3>
                        <img src="https://c8.alamy.com/comp/M6856R/fried-pork-chop-french-fries-and-vegetables-isolated-on-white-background-M6856R.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Pork & Fries</h1>
                        <a class="menu-card-link">KES 450/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('pork & fries', 450)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>DRINKS</b></h3>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_nW5HmtisOkf3FhNXFoCuqDbBaw6l9Xca5Q&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Lemonade</h1>
                        <a class="menu-card-link">KES 250/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Lemonade', 250)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://t3.ftcdn.net/jpg/01/28/80/64/360_F_128806474_w6f5w2DZKATJXJKwfGTWQAsqVmFbCngy.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Milkshake</h1>
                        <a class="menu-card-link">KES 400/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Milkshake', 400)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLoQT4rJ-OBZ01D_Ym8UuRIZmkaaBR-zOURA&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Fresh Juice</h1>
                        <a class="menu-card-link">KES 250/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Fresh juice', 250)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvWLiawuU48Dr2Vj39AhXY16VmdkAnZHRO_A&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Mocktails</h1>
                        <a class="menu-card-link">KES 350/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Mocktails', 350)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>BREAKFAST</b></h3>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ83PYzUsA4R5YIYwGercD03A2KyLa6-5Qoqw&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Arrowroots boiled</h1>
                        <a class="menu-card-link">KES 150/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Arrowroots boiled', 150)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk_UhmrZk3KfshGH3KOS7cTMsMMr-h6uQ8ag&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Sweet potatoes</h1>
                        <a class="menu-card-link">KES 100/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Sweet Potatoes', 100)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYc2bqbl8ujDN3V8xDkbVi8q304PssDTLBvw&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">French Toast</h1>
                        <a class="menu-card-link">KES 170/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('French toast', 170)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_FUVRW-blRtQjZDQzUeWqrDJkJHZFGss_8w&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Spanish</h1>
                        <a class="menu-card-link">KES 150/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Spanish', 150)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHxAg3Z0eXTNB2c15i5VwKYA4nMFG1hM7-DA&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Tea</h1>
                        <a class="menu-card-link">KES 100/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('tea', 100)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkisB4t7GFDoeQipGM7LZe-sReyQi3l4qG0w&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Brewed Coffee</h1>
                        <a class="menu-card-link">KES 100/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Brewed Coffee', 100)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://media.istockphoto.com/id/183138035/photo/cup-of-latte-coffee-and-spoon-on-gray-counter.jpg?s=612x612&w=0&k=20&c=Iht-hG2bzxiZgpjao6RELKAbw4oG7ujS2wQNkiM2rqU="
                            class="menu-card-image" />
                        <h1 class="menu-card-title">White Coffee</h1>
                        <a class="menu-card-link">KES 200/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('White coffee', 200)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY84Gfp-lQK5ZOPqNxluRZu-lZfxzfszoKvg&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Pancakes</h1>
                        <a class="menu-card-link">KES 50/= Each</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Pancakes', 50)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6SY0Gi1gjv_lzejSqJH3NJlH1zi7ltWHF_w&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Sausages / Smokies</h1>
                        <a class="menu-card-link">KES 50/= </a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Sausages/smokies', 50)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://t4.ftcdn.net/jpg/05/11/08/05/360_F_511080597_NvqjRdezlARSQHy4VpAKFvUVTEeGdlLy.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Samosa</h1>
                        <a class="menu-card-link">KES 70/= Each </a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <button class="add-to-cart-btn" onclick="addToCart('Samosa', 70)"> Add to Cart <i
                                class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="healthy-food-section pb-5 pt-5" id="sectionHealthyFood">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="https://media.istockphoto.com/id/1457433817/photo/group-of-healthy-food-for-flexitarian-diet.jpg?s=612x612&w=0&k=20&c=v48RE0ZNWpMZOlSp13KdF1yFDmidorO2pZTu2Idmd3M="
                        class="healthy-food-image" alt="Healthy Food">
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="healthy-food-heading">Healthy Food</h1>
                    <p class="healthy-food-para">We believe in offering nothing but the best and healthiest food options
                        for our customers. Whether you're on a diet or just prefer healthy food, we've got you covered.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="follow-us-section pb-5 pt-5" id="sectionDeliveryPayments">
        <div class="container text-center">

            <h4>You call, we deliver</h4>
            <h4>You can pay before delivery or pay on delivery</h4>
            <img
                src="https://monito-cms.imgix.net/05d5d4c0-1683-4340-87a8-38d72ba36b94_MPESA.png?auto=compress,format&rect=0,0,3000,1285&w=1800&h=771" />
            <br> <br>

            <h1 class="follow-us-heading">Drop us a line / Contact us </h1>
            <a href="https://wa.me/+254113138193" target="_blank">Click here to chat with me on WhatsApp</a> <br> <br>


            <a href="billomolo230@gmail.com">Click here to Send me an email</a> <br> <br>


            <a href="tel:+254113138193">Click here to Call me</a>

            <div id="get-help-icon">
                💬 Get Help
            </div>

            <!-- Chat Interface -->
            <div id="chat-container" style="display: none;">
                <div id="chat-box">
                    <div id="chat-log"></div>
                    <input type="text" id="user-input" placeholder="Type your message...">
                    <button id="send-btn">Send</button>
                </div>
            </div>
            <script>
            document.getElementById('get-help-icon').addEventListener('click', function() {
                const chatContainer = document.getElementById('chat-container');
                if (chatContainer.style.display === 'none' || chatContainer.style.display === '') {
                    chatContainer.style.display = 'block';
                } else {
                    chatContainer.style.display = 'none';
                }
            });

            document.getElementById('send-btn').addEventListener('click', function() {
                const userInput = document.getElementById('user-input').value;
                if (userInput.trim() !== "") {
                    addMessage('User', userInput);
                    getBotResponse(userInput);
                    document.getElementById('user-input').value = "";
                }
            });

            function addMessage(sender, message) {
                const chatLog = document.getElementById('chat-log');
                const messageDiv = document.createElement('div');
                messageDiv.textContent = `${sender}: ${message}`;
                chatLog.appendChild(messageDiv);
                chatLog.scrollTop = chatLog.scrollHeight;
            }

            function getBotResponse(userMessage) {
                let botResponse = '';

                // Simple responses based on keywords
                if (userMessage.toLowerCase().includes('hello')) {
                    botResponse = 'Hi there! How can I assist you today?';
                } else if (userMessage.toLowerCase().includes('hi')) {
                    botResponse = 'Hi there! How can I assist you today?';
                } else if (userMessage.toLowerCase().includes('order')) {
                    botResponse = 'You can place an order by visiting our order page. Select many items as you like';
                } else if (userMessage.toLowerCase().includes('contact')) {
                    botResponse = 'You can contact us using this number:  +254113138193.';
                } else if (userMessage.toLowerCase().includes('pay')) {
                    botResponse = 'You can pay on delivery or pay in advance using the given number: +254113138193';
                } else if (userMessage.toLowerCase().includes('menu')) {
                    botResponse = 'Navigate to menu section in the homepage see for yourself !!';
                } else if (userMessage.toLowerCase().includes('thank you ')) {
                    botResponse = 'Anytime. Feel free to ask anything bugging you';
                } else {
                    botResponse = 'I\'m not sure how to help with that. Please try asking something else.';
                }

                addMessage('Digital Lunchbox', botResponse);
            }

            document.addEventListener("DOMContentLoaded", () => {
                const userDisplay = document.getElementById("userDisplay");
                const loggedInUsername = localStorage.getItem("username");
                const isLoggedIn = localStorage.getItem("loggedIn");

                if (isLoggedIn === "true" && loggedInUsername) {
                    userDisplay.textContent = loggedInUsername;
                } else {
                    userDisplay.textContent = "Username";
                }
            });

            function openModal() {
                document.getElementById("userModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("userModal").style.display = "none";
            }

            function logout() {
                localStorage.removeItem("loggedIn");
                localStorage.removeItem("username");
                // Redirect to the login page or any other page
            }

            // JavaScript to handle the "Add to Cart" functionality
            // JavaScript to handle the "Add to Cart" functionality
            function addToCart(itemName, itemPrice) {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];

                // Check if the item already exists in the cart
                let itemExists = cart.find(item => item.name === itemName);

                if (itemExists) {
                    itemExists.quantity += 1; // Increase quantity if item already exists
                } else {
                    cart.push({
                        name: itemName,
                        price: itemPrice,
                        quantity: 1
                    });
                }

                // Save the updated cart to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                alert(`${itemName} has been added to your cart.`);
            }


            document.addEventListener("DOMContentLoaded", () => {
                const cartCountElement = document.getElementById("cart-count");
                let cart = JSON.parse(localStorage.getItem('cart')) || [];

                // Function to update the cart count
                function updateCartCount() {
                    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
                    cartCountElement.textContent = cartCount;
                }

                // Add to cart function
                window.addToCart = function(name, price) {
                    const existingItem = cart.find(item => item.name === name);
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({
                            name,
                            price,
                            quantity: 1
                        });
                    }
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartCount();
                }

                // Initial cart count update
                updateCartCount();
            });
            </script>



        </div>
    </div>

    <div class="cookie-consent" id="cookieConsent">
        This website uses cookies to ensure you get the best experience on our website.
        <button id="acceptCookies">Accept</button>
    </div>
    <script>
    // JavaScript to handle the cookie consent
    document.addEventListener("DOMContentLoaded", function() {
        var cookieConsent = document.getElementById('cookieConsent');
        var acceptCookies = document.getElementById('acceptCookies');

        if (!getCookie('cookiesAccepted')) {
            cookieConsent.style.display = 'block';
        }

        acceptCookies.addEventListener('click', function() {
            setCookie('cookiesAccepted', 'true', 365);
            cookieConsent.style.display = 'none';
        });

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
    });
    </script>

    <div class="footer-section pb-5 pt-5 bg-dark text-white">
        <div class="container text-center">
            <h1 class="footer-heading">Digital Lunchbox</h1>
            <p class="footer-para">Exploring your Taste Buds </p>
            <p class="footer-para">&copy; 2024 Digital Lunchbox. All Rights Reserved.</p>
        </div>
    </div>
    <script src="home.js"></script>
    <script>
    function openModal() {
        document.getElementById('userModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('userModal').style.display = 'none';
    }

    function logout() {
        // Clear user data from local storage
        localStorage.removeItem('userName');
        localStorage.removeItem('userPassword');
        // Redirect to login page
        window.location.href = 'index.php';
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById('userModal')) {
            document.getElementById('userModal').style.display = 'none';
        }
    }
    </script>

</body>

</html>