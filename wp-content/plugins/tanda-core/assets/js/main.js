;(function($){
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/services.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.services-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ],
                    dots: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 3,
                        }
                    }
                });

            });
        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/service7.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.services-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ],
                    dots: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 3,
                        }
                    }
                });

            });
        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/service8.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.services-2-col-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ],
                    dots: true,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 2
                        }
                    }
                });
            });
        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/service9.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.standard-services-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ],
                    dots: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 4,
                        }
                    }
                });

            });
        });
    });
    

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/case.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.case-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

            });
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/client.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
            
            $('.clients-carousel').owlCarousel({
            loop: false,
            margin: 80,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

            });
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
            
            $('.testimonial-carousel').owlCarousel({
            loop: false,
            margin: 50,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    items: 1
                },
                1200: {
                    items: 2
                }
            }
        });

            });
        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/client11.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
            
            $('.brand-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3,
                    margin: 80,
                },
                1000: {
                    items: 4,
                    margin: 80,
                }
            }
        });

            });
        });
    });
    
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/case10.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
            
            $('.case-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

            });
        });
    });

})(jQuery);
