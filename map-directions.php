<?php include_once('includes/header.php'); ?>

    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Barristers, Solicitors, Law, Lawyers, attorneys, Toronto, Ontario Canada, Areas of law, corporate, real estate, hospitality, leisure, litigation, immigration, securities, employment, family, estate, international trade" />
    <meta name="description" content="We provide legal services and are experts in the following areas of law: corporate, civil litigation, immigration, securities, estates, and real estate law." />
    <title>Map &amp; Directions</title>
    <link rel="stylesheet" href="/components/com_phocamaps/assets/phocamaps.css" type="text/css" />
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="/components/com_phocamaps/assets/js/geoXML3.js"></script>
    <script type="text/javascript" src="/components/com_phocamaps/assets/js/base64.js"></script>
    <script type="text/javascript">
        try {
            document.execCommand("BackgroundImageCache", false, true);
        } catch (e) {};
    </script>
    <style type="text/css">
        #ariyuimenu_ariyui59 A {
            font-size: 14px !important;
            font-weight: normal !important;
            text-transform: none !important;
        }
    </style>
    <script type="text/javascript">
        YAHOO.util.Event.onContentReady("ariyuimenu_ariyui59", function() {
            var oMenu = new YAHOO.widget.MenuBar("ariyuimenu_ariyui59", {
                "lazyLoad": true,
                "autosubmenudisplay": true,
                "position": "static",
                "hidedelay": 750
            });
            oMenu.render();
            oMenu.show();
            if (-1 > -1) oMenu.getItem(-1).cfg.setProperty("selected", true);
        });
    </script>
</head>

<body>

<div id="container">
    <?php include_once('includes/nav.php'); ?>

    <div id="sep"></div>
    <div id="body">
        <div id="inner_body">
            <div id="leftcol">
                <div class="left-inside">
                    <div class="module">
                        <div>
                            <div>
                                <div>
                                    <h3>Map & Directions</h3>
                                    <p><img style="vertical-align: middle;" src="/images/stories/globe-w.jpg" border="0" alt="globe-w" width="165" height="162" /></p>
                                    <p>Baldwin Sennecke Halman LLP</p>
                                    <p>Victoria Tower
                                        <br />25 Adelaide Street East
                                        <br />Toronto, ON M5C 3A1</p>
                                    <p>The entrance to the building is located on the west side of Victoria Street south of Adelaide.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="phocamaps">
                <div class="phocamaps-box" align="center" style="margin:0;padding:0;margin-top:10px;">
                    <div id="phocaMap" style="margin:0;padding:0;width:700px;height:370px"></div>
                </div>
                <div class="pmroute">
                    <form action="#" onsubmit="setPhocaDir(this.pmfrom.value, this.pmto.value); return false;">From (address):
                        <input type="text" size="30" id="fromPMAddress" name="pmfrom" value="" />
                        <input name="pmto" id="toPMAddress" type="hidden" value="43.6505423,-79.3774835" />
                        <input name="pmsubmit" type="submit" value="Get Route" />
                    </form>
                </div>
                <div id="phocaDir">
                    <div id="phocaMapsPrintIcon" style="display:none"></div>
                </div>
                <script type="text/javascript">
                    //<![CDATA[
                    google.load("maps", "3.x", {
                        other_params: "sensor=false&language=EN"
                    });
                    google.load("search", "1", {
                        "language": "EN"
                    });

                    var tstPhocaMap = document.getElementById('phocaMap');
                    var tstIntPhocaMap;
                    var mapPhocaMap;
                    var phocaDirDisplay;
                    var phocaDirService;

                    function CancelEventPhocaMap(event) {
                        var e = event;
                        if (typeof e.preventDefault == 'function') e.preventDefault();
                        if (typeof e.stopPropagation == 'function') e.stopPropagation();
                        if (window.event) {
                            window.event.cancelBubble = true; /* for IE */
                            window.event.returnValue = false; /* for IE */
                        }
                    }

                    function CheckPhocaMap() {
                        if (tstPhocaMap) {
                            if (tstPhocaMap.offsetWidth != tstPhocaMap.getAttribute("oldValue")) {
                                tstPhocaMap.setAttribute("oldValue", tstPhocaMap.offsetWidth);
                                if (tstPhocaMap.getAttribute("refreshMap") == 0) {
                                    if (tstPhocaMap.offsetWidth > 0) {
                                        clearInterval(tstIntPhocaMap);
                                        getPhocaMap();
                                        tstPhocaMap.setAttribute("refreshMap", 1);
                                    }
                                }
                            }
                        }
                    }

                    function getPhocaMap() {
                        if (tstPhocaMap.offsetWidth > 0) {

                            var phocaLatLng = new google.maps.LatLng(43.6505423, -79.3774835);
                            var phocaOptions = {
                                zoom: 17,
                                center: phocaLatLng,
                                mapTypeControl: true,
                                mapTypeControlOptions: {
                                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                                    position: google.maps.ControlPosition.TOP_RIGHT
                                },
                                navigationControl: true,
                                navigationControlOptions: {
                                    style: google.maps.NavigationControlStyle.DEFAULT
                                },
                                scaleControl: true,
                                scrollwheel: 1,
                                disableDoubleClickZoom: 0,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };

                            mapPhocaMap = new google.maps.Map(document.getElementById('phocaMap'), phocaOptions);
                            var phocaImage3 = new google.maps.MarkerImage('/components/com_phocamaps/assets/images/ihome/image.png',
                                new google.maps.Size(26, 26),
                                new google.maps.Point(0, 0),
                                new google.maps.Point(0, 30));
                            var phocaImageShadow3 = new google.maps.MarkerImage('/components/com_phocamaps/assets/images/ihome/shadow.png',
                                new google.maps.Size(39, 26),
                                new google.maps.Point(0, 0),
                                new google.maps.Point(0, 30));
                            var phocaImageShape3 = {
                                coord: [13, 1, 20, 2, 20, 3, 20, 4, 20, 5, 20, 6, 20, 7, 20, 8, 20, 9, 21, 10, 23, 11, 23, 12, 23, 13, 22, 14, 22, 15, 22, 16, 22, 17, 22, 18, 22, 19, 22, 20, 22, 21, 22, 22, 22, 23, 22, 24, 2, 24, 2, 23, 2, 22, 2, 21, 2, 20, 2, 19, 2, 18, 2, 17, 2, 16, 2, 15, 3, 14, 1, 13, 1, 12, 1, 11, 3, 10, 4, 9, 5, 8, 6, 7, 7, 6, 8, 5, 9, 4, 10, 3, 10, 2, 11, 1],
                                type: 'poly'
                            };
                            var phocaPoint1 = new google.maps.LatLng(43.6505423, -79.3774835);
                            var markerPhocaMarker1 = new google.maps.Marker({
                                title: "Map & Directions",
                                icon: phocaImage3,
                                shadow: phocaImageShadow3,
                                shape: phocaImageShape3,
                                position: phocaPoint1,
                                map: mapPhocaMap
                            });
                            var infoPhocaWindow1 = new google.maps.InfoWindow({
                                content: '<h1>Map & Directions</h1><div></div>'
                            });
                            google.maps.event.addListener(markerPhocaMarker1, 'click', function() {
                                infoPhocaWindow1.open(mapPhocaMap, markerPhocaMarker1);
                            });
                            phocaDirService = new google.maps.DirectionsService();
                            phocaDirDisplay = new google.maps.DirectionsRenderer();
                            phocaDirDisplay.setMap(mapPhocaMap);
                            phocaDirDisplay.setPanel(document.getElementById("phocaDir"));
                            google.maps.event.addDomListener(tstPhocaMap, 'DOMMouseScroll', CancelEventPhocaMap);
                            google.maps.event.addDomListener(tstPhocaMap, 'mousewheel', CancelEventPhocaMap);
                        }
                    }

                    function setPhocaDir(fromPMAddress, toPMAddress) {
                        var request = {
                            origin: fromPMAddress,
                            destination: toPMAddress,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                        };

                        phocaDirService.route(request, function(response, status) {

                            if (status == google.maps.DirectionsStatus.OK) {
                                pPI = document.getElementById('phocaMapsPrintIcon');
                                pPI.style.display = 'block';
                                var from64 = Base64.encode(fromPMAddress).toString();
                                var to64 = Base64.encode(toPMAddress).toString();
                                pPI.innerHTML = '<div class="pmprintroutelink"><a href=\u0022/map-directions/route/1-map-directions.php?tmpl=component&amp;print=1&amp;from=' + from64 + '&amp;to=' + to64 + '&amp;lang=EN\u0022 rel=\u0022nofollow\u0022 onclick=\u0022window.open(this.href,\'phocaMapRoute\',\'width=640,height=480,menubar=yes,resizable=yes,scrollbars=yes,resizable=yes\'); return false;\u0022 >Print Route</a></div><div style="clear:both"></div>';

                                phocaDirDisplay.setDirections(response);
                            } else if (google.maps.DirectionsStatus.NOT_FOND) {
                                alert("One of the locations specified in the requests's origin, destination, or waypoints could not be geocoded.");
                            } else if (google.maps.DirectionsStatus.ZERO_RESULTS) {
                                alert("No route could be found between the origin and destination.");
                            } else if (google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED) {
                                alert("Too many DirectionsWaypoints were provided in the DirectionsRequest.");
                            } else if (google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
                                alert("Webpage has sent too many requests within the allowed time period.");
                            } else if (google.maps.DirectionsStatus.INVALID_REQUEST) {
                                alert("The provided DirectionsRequest was invalid.");
                            } else if (google.maps.DirectionsStatus.REQUEST_DENIED) {
                                alert("Webpage is not allowed to use the directions service.");
                            } else if (google.maps.DirectionsStatus.UNKNOWN_ERROR) {
                                alert("Directions request could not be processed due to a server error. The request may succeed if you try again.");
                            } else {
                                alert("Directions request could not be processed due to a server error. The request may succeed if you try again.");
                            }
                        });
                    }

                    function initialize() {
                        tstPhocaMap.setAttribute("oldValue", 0);
                        tstPhocaMap.setAttribute("refreshMap", 0);
                        tstIntPhocaMap = setInterval("CheckPhocaMap()", 500);
                    }

                    google.setOnLoadCallback(initialize);
                    //]]>
                </script>
                <noscript>
                    <p class="p-noscript">For displaying map you need to enable JavaScript in your browser</p>
                    <p>&nbsp;</p>
                </noscript>

            </div>
            <div id="bottom">

            </div>
        </div>
    </div>
</div>

<?php include_once('includes/footer.php'); ?>