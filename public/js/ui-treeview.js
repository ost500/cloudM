/**
 * Created by OST on 2016-06-17.
 */
var UITreeview = function () {
    "use strict";
    //function to initiate jquery.dynatree
    var runTreeView = function () {


        //Checkbox
        $('#tree_2').jstree({
            'plugins': ["wholerow", "checkbox", "types"],
            'core': {
                "themes": {
                    "responsive": false
                },
                'data': [
                    {
                        "text": "분야 ",

                        "state": {
                            "selected": false,
                            "opened": true,
                        },
                        "children": [
                            {

                                "icon": "fa fa-folder text-primary",
                                "text": "매체 광고",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {
                                        "id": "area_1_1",
                                        "icon": "fa fa-folder text-primary",
                                        "text": "네이버CPC"
                                    },
                                    {"id": "area_1_2", "icon": "fa fa-folder text-primary", "text": "구글광고"},
                                    {"id": "area_1_3", "icon": "fa fa-folder text-primary", "text": "페이스북 스폰서광고"},
                                    {"id": "area_1_4", "icon": "fa fa-folder text-primary", "text": "매체 기타"},
                                ]

                            }, {
                                "icon": "fa fa-folder text-primary",
                                "text": "바이럴",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "area_2_1", "icon": "fa fa-folder text-primary", "text": "네이버SEO"},
                                    {"id": "area_2_2", "icon": "fa fa-folder text-primary", "text": "언론보도"},
                                    {"id": "area_2_3", "icon": "fa fa-folder text-primary", "text": "컨텐츠 배포"},
                                    {"id": "area_2_4", "icon": "fa fa-folder text-primary", "text": "체험단 모집"},
                                    {"id": "area_2_5", "icon": "fa fa-folder text-primary", "text": "바이럴 기타"},
                                ]

                            }, {
                                "icon": "fa fa-folder text-primary",
                                "text": "운영대행",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "area_3_1", "icon": "fa fa-folder text-primary", "text": "블로그"},
                                    {"id": "area_3_2", "icon": "fa fa-folder text-primary", "text": "페이스북페이지"},
                                    {"id": "area_3_3", "icon": "fa fa-folder text-primary", "text": "기타SNS"},
                                    {"id": "area_3_4", "icon": "fa fa-folder text-primary", "text": "홈페이지"},
                                    {"id": "area_3_5", "icon": "fa fa-folder text-primary", "text": "운영대행 기타"},
                                ]

                            }, {
                                "icon": "fa fa-folder text-primary",
                                "text": "1회성 프로젝트",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "area_4_1", "icon": "fa fa-folder text-primary", "text": "개발"},
                                    {"id": "area_4_2", "icon": "fa fa-folder text-primary", "text": "디자인"},
                                    {"id": "area_4_3", "icon": "fa fa-folder text-primary", "text": "웹툰"},
                                    {"id": "area_4_4", "icon": "fa fa-folder text-primary", "text": "영상"},
                                    {"id": "area_4_5", "icon": "fa fa-folder text-primary", "text": "1회성 프로젝트 기타"},
                                ]

                            },


                        ]
                    },


                    {
                        "text": "업종",
                        "state": {
                            "selected": false,
                            "opened": true
                        },
                        "children": [
                            {
                                "id": "category_1",
                                "icon": "fa fa-folder text-primary",
                                "text": "의료",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "category_2",
                                "icon": "fa fa-folder text-primary",
                                "text": "법률",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "category_3",
                                "icon": "fa fa-folder text-primary",
                                "text": "스타트업",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "category_4",
                                "icon": "fa fa-folder text-primary",
                                "text": "프랜차이즈",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "category_5",
                                "icon": "fa fa-folder text-primary",
                                "text": "교육/대학교",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "category_6",
                                "icon": "fa fa-folder text-primary",
                                "text": "쇼핑몰",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "category_7",
                                "icon": "fa fa-folder text-primary",
                                "text": "기타",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }


                        ]
                    }


                ]
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder text-primary fa-lg"
                },
                "file": {
                    "icon": "fa fa-file text-primary fa-lg"
                }
            }
        });


        // Drag & drop
        $("#tree_3").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                "check_callback": true,
                'data': [{
                    "text": "Parent Node",
                    "children": [{
                        "text": "Initially selected",
                        "state": {
                            "selected": true
                        }
                    }, {
                        "text": "Custom Icon",
                        "icon": "fa fa-warning text-primary"
                    }, {
                        "text": "Initially open",
                        "icon": "fa fa-folder text-primary",
                        "state": {
                            "opened": true
                        },
                        "children": [{
                            "text": "Another node",
                            "icon": "fa fa-file text-primary"
                        }]
                    }, {
                        "text": "Another Custom Icon",
                        "icon": "fa fa-warning text-primary"
                    }, {
                        "text": "Disabled Node",
                        "icon": "fa fa-check text-primary",
                        "state": {
                            "disabled": true
                        }
                    }, {
                        "text": "Sub Nodes",
                        "icon": "fa fa-folder text-primary",
                        "children": [{
                            "text": "Item 1",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 2",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 3",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 4",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 5",
                            "icon": "fa fa-file text-primary"
                        }]
                    }]
                }, "Another Node"]
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder text-primary fa-lg"
                },
                "file": {
                    "icon": "fa fa-file text-primary fa-lg"
                }
            },
            "state": {
                "key": "demo2"
            },
            "plugins": ["dnd", "types"]
        });
        // Drag & drop
        $("#tree_4").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                "check_callback": true,
                'data': [{
                    "text": "Parent Node",
                    "children": [{
                        "text": "Initially selected",
                        "state": {
                            "selected": true
                        }
                    }, {
                        "text": "Custom Icon",
                        "icon": "fa fa-warning text-primary"
                    }, {
                        "text": "Initially open",
                        "icon": "fa fa-folder text-primary",
                        "state": {
                            "opened": true
                        },
                        "children": [{
                            "text": "Another node",
                            "icon": "fa fa-file text-primary"
                        }]
                    }, {
                        "text": "Another Custom Icon",
                        "icon": "fa fa-warning text-primary"
                    }, {
                        "text": "Disabled Node",
                        "icon": "fa fa-check text-primary",
                        "state": {
                            "disabled": true
                        }
                    }, {
                        "text": "Sub Nodes",
                        "icon": "fa fa-folder text-primary",
                        "children": [{
                            "text": "Item 1",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 2",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 3",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 4",
                            "icon": "fa fa-file text-primary"
                        }, {
                            "text": "Item 5",
                            "icon": "fa fa-file text-primary"
                        }]
                    }]
                }, "Another Node"]
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder text-primary fa-lg"
                },
                "file": {
                    "icon": "fa fa-file text-primary fa-lg"
                }
            },
            "state": {
                "key": "demo2"
            },
            "plugins": ["search", "types"]
        });
        var to = false;
        $('#tree_4_search').keyup(function () {
            if (to) {
                clearTimeout(to);
            }
            to = setTimeout(function () {
                var v = $('#tree_4_search').val();
                $('#tree_4').jstree(true).search(v);
            }, 250);
        });

    };
    return {
        //main function to initiate template pages
        init: function () {
            runTreeView();
        }
    };
}();