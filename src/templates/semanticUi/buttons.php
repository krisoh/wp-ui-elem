<!DOCTYPE html>
<html>
<head>
    <title>Semantic UI Button Shortcode</title>
    <link rel="stylesheet" href="../../css/semantic.min.css" >
    <link rel="stylesheet" href="buttons.css" >
</head>
<body>
<div class="ui container btn_container">
    <div class="btn_accordion">
        <div class="ui relaxed divided list">
            <div class="item">
                <i class="large github middle aligned icon"></i>
                <div class="content">
                    <a class="header">Global Button Config</a>
                    <div class="description">Updated 10 mins ago</div>
                </div>
            </div>
            <div class="item">
                <i class="large github middle aligned icon"></i>
                <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI-Docs</a>
                    <div class="description">Updated 22 mins ago</div>
                </div>
            </div>
            <div class="item">
                <i class="large github middle aligned icon"></i>
                <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI-Meteor</a>
                    <div class="description">Updated 34 mins ago</div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn_content">
        <div class="ui two column  grid container">
            <h4 class="ui horizontal divider" >
                Button Global Config
            </h4>
        <div class="column">
            <h5>
                Button color
                <div class="ui selection dropdown btn_color">
                    <input type="hidden" name="color">
                    <div class="default text">Button Color</div>
                    <div class="menu">
                        <div class="item" data-value="1"> <div class="ui red empty circular label"></div> Red</div>
                        <div class="item" data-value="2"> <div class="ui orange empty circular label"></div> Orange</div>
                        <div class="item" data-value="3"> <div class="ui yellow empty circular label"></div> Yellow </div>
                        <div class="item" data-value="4"> <div class="ui olive empty circular label"></div> Olive</div>
                        <div class="item" data-value="5"> <div class="ui green empty circular label"></div> Green</div>
                        <div class="item" data-value="6"> <div class="ui teal empty circular label"></div> Teal</div>
                        <div class="item" data-value="7"> <div class="ui blue empty circular label"></div> Blue</div>
                        <div class="item" data-value="8"> <div class="ui violet empty circular label"></div> Violet</div>
                        <div class="item" data-value="9"> <div class="ui purple empty circular label"></div> Purple</div>
                        <div class="item" data-value="10"> <div class="ui pink empty circular label"></div> Pink</div>
                        <div class="item" data-value="11"> <div class="ui brown empty circular label"></div> Brown</div>
                        <div class="item" data-value="12"> <div class="ui grey empty circular label"></div> Grey</div>
                        <div class="item" data-value="13"> <div class="ui black empty circular label"></div> Black</div>

                    </div>
                </div>
            </h5>
        </div>
        <div class="column">
            <h5>
                Button size
                <div class="ui selection dropdown btn_size">
                    <input type="hidden" name="size">
                    <div class="default text">Button Size</div>
                    <div class="menu">
                        <div class="item" data-value="1">  Mini</div>
                        <div class="item" data-value="2">  Tiny</div>
                        <div class="item" data-value="3">  Small </div>
                        <div class="item" data-value="4">  Medium</div>
                        <div class="item" data-value="5">  Large</div>
                        <div class="item" data-value="6">  Big</div>
                        <div class="item" data-value="7">  Huge</div>
                        <div class="item" data-value="8">  Massive</div>
                    </div>
                </div>
            </h5>
        </div>
            <div class="column">
                <h5>
                    Button Type
                    <div class="ui selection dropdown btn_type">
                        <input type="hidden" name="type">
                        <div class="default text">Button Type</div>
                        <div class="menu">
                            <div class="item" data-value="1">  Default</div>
                            <div class="item" data-value="2">  Animated</div>
                            <div class="item" data-value="3">  Labeled </div>
                            <div class="item" data-value="4">  Labeled Icon</div>
                            <div class="item" data-value="5">  Basic</div>
                            <div class="item" data-value="6">  Inverted</div>
                        </div>
                    </div>
                </h5>
            </div>
            <div class="column">
                <h5>
                    Button Text
                    <div class="ui input btn_text">
                        <input type="text" placeholder="Search...">
                    </div>
                </h5>
            </div>
        </div>
        <div class="ui two column  grid container labeled">
            <h4 class="ui horizontal divider" >
               Label Button Config
            </h4>
            <div class="ui floating dropdown labeled icon button">
                <i class="filter icon"></i>
                <span class="text">Filter Posts</span>
                <div class="menu">
                    <div class="ui icon search input">
                        <i class="search icon"></i>
                        <input type="text" placeholder="Search tags...">
                    </div>
                    <div class="divider"></div>
                    <div class="header">
                        <i class="tags icon"></i>
                        Tag Label
                    </div>
                    <div id="main_drop" class="scrolling menu">

                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
</body>
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

<script src="../../js/semantic.min.js"></script>
<script src="../../js/font_awsome_dropdown.js"></script>
<script src="buttons.js"></script>

</html>