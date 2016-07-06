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
                                        "id": "id_1",
                                        "icon": "fa fa-folder text-primary",
                                        "text": "네이버CPC"
                                    },
                                    {"id": "id_2", "icon": "fa fa-folder text-primary", "text": "언론보도"},
                                    {"id": "id_3", "icon": "fa fa-folder text-primary", "text": "구글광고"},
                                    {"id": "id_4", "icon": "fa fa-folder text-primary", "text": "페이스북광고"},
                                    {"id": "id_5", "icon": "fa fa-folder text-primary", "text": "매체 기타"},
                                ]

                            }, {
                                "icon": "fa fa-folder text-primary",
                                "text": "바이럴",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "id_6", "icon": "fa fa-folder text-primary", "text": "네이버SEO"},

                                    {"id": "id_7", "icon": "fa fa-folder text-primary", "text": "컨텐츠 배포"},
                                    {"id": "id_8", "icon": "fa fa-folder text-primary", "text": "체험단 모집"},
                                    {"id": "id_9", "icon": "fa fa-folder text-primary", "text": "바이럴 기타"},
                                ]

                            }, {
                                "icon": "fa fa-folder text-primary",
                                "text": "운영대행",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "id_10", "icon": "fa fa-folder text-primary", "text": "블로그"},
                                    {"id": "id_11", "icon": "fa fa-folder text-primary", "text": "페이스북페이지"},
                                    {"id": "id_12", "icon": "fa fa-folder text-primary", "text": "기타SNS"},
                                    {"id": "id_13", "icon": "fa fa-folder text-primary", "text": "홈페이지"},
                                    {"id": "id_14", "icon": "fa fa-folder text-primary", "text": "운영대행 기타"},
                                ]

                            }, {
                                "icon": "fa fa-folder text-primary",
                                "text": "1회성 프로젝트",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "id_15", "icon": "fa fa-folder text-primary", "text": "개발"},
                                    {"id": "id_16", "icon": "fa fa-folder text-primary", "text": "디자인"},
                                    {"id": "id_17", "icon": "fa fa-folder text-primary", "text": "웹툰"},
                                    {"id": "id_18", "icon": "fa fa-folder text-primary", "text": "영상"},
                                    {"id": "id_19", "icon": "fa fa-folder text-primary", "text": "1회성 프로젝트 기타"},
                                ]

                            },
                            {
                                "icon": "fa fa-folder text-primary",
                                "text": "오프라인 광고",
                                "state": {
                                    "selected": false,

                                },
                                "children": [
                                    {"id": "id_20", "icon": "fa fa-folder text-primary", "text": "TV광고"},
                                    {"id": "id_21", "icon": "fa fa-folder text-primary", "text": "신문광고"},
                                    {"id": "id_22", "icon": "fa fa-folder text-primary", "text": "라디오광고"},
                                    {"id": "id_23", "icon": "fa fa-folder text-primary", "text": "지하철광고"},
                                    {"id": "id_24", "icon": "fa fa-folder text-primary", "text": "버스광고"},
                                    {"id": "id_25", "icon": "fa fa-folder text-primary", "text": "잡지광고"},
                                    {"id": "id_26", "icon": "fa fa-folder text-primary", "text": "외부광고"},
                                    {"id": "id_27", "icon": "fa fa-folder text-primary", "text": "오프라인 기타"},
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
                                "id": "id_28",
                                "icon": "fa fa-folder text-primary",
                                "text": "의료",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "id_29",
                                "icon": "fa fa-folder text-primary",
                                "text": "법률",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "id_30",
                                "icon": "fa fa-folder text-primary",
                                "text": "스타트업",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "id_31",
                                "icon": "fa fa-folder text-primary",
                                "text": "프랜차이즈",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "id_32",
                                "icon": "fa fa-folder text-primary",
                                "text": "교육/대학교",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "id_33",
                                "icon": "fa fa-folder text-primary",
                                "text": "쇼핑몰",
                                "state": {
                                    "selected": false,
                                    "opened": true,
                                }


                            }, {
                                "id": "id_34",
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