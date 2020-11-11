var $ = jQuery;

var dataScroll ;

class ShortcodeText extends React.Component {
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	componentDidMount() {
		var thiss = this;
        (function($) {

        }(window.jQuery));
	}
	componentDidUpdate() {
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated bb-text">
				<link rel="stylesheet"href={this.state.settings.fontFamily?'https://fonts.googleapis.com/css?family='+this.state.settings.fontFamily:''}></link>
				<p 
				style={{
					fontSize:this.state.settings.fontSize,
					fontFamily:this.state.settings.fontFamily,
					fontWeight:this.state.settings.fontWeight,
					fontStyle:this.state.settings.fontStyle,
					textAlign:this.state.settings.textAlign,
					textTransform:this.state.settings.textTransform,
					letterSpacing:this.state.settings.letterSpacing,
					lineHeight:this.state.settings.lineHeight,
					textDecoration:this.state.settings.textDecoration,
				}} 
				className={this.state.settings.classCSS}>
					{this.state.settings.content}
				</p>
			</div>
        )
    }
};

class ShortcodeImg extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	componentDidMount() {
		var thiss = this;
        (function($) {


        }(window.jQuery));
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated bb-img">
				<img src={this.state.settings.image} alt={this.state.settings.alt} id="bb-vcvs-demo-element"  className={" "+ this.state.settings.classCSS} />
			</div>
        )
    }
};

class ShortcodeBottom extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	componentDidMount() {
		var thiss = this;
        (function($) {


        }(window.jQuery));
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated bb-button">
				<a className={this.state.settings.classCSS}>
					<i style={{fontSize:this.state.settings.iconFontSize,}} className={this.state.settings['iconButton']}></i>
					<span 
					style={{
						fontSize:this.state.settings.fontSize,
						fontFamily:this.state.settings.fontFamily,
						fontWeight:this.state.settings.fontWeight,
						fontStyle:this.state.settings.fontStyle,
						textTransform:this.state.settings.textTransform,
						letterSpacing:this.state.settings.letterSpacing,
						lineHeight:this.state.settings.lineHeight,
						textDecoration:this.state.settings.textDecoration,
					}} 
					>{this.state.settings.title}</span>
				</a>
			</div>
        )
    }
};

class ShortcodeSequnce extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	componentDidMount() {
		var thiss = this;
        (function($) {


        }(window.jQuery));
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated bb-sequence">
				<div class="bbsm-imagesequence"  data-bbsm-imagesequence={this.state.settings.images}>
					<img src={this.state.settings.images? this.state.settings.images[0] :''} alt={this.state.settings.alt} className={this.state.settings.classCSS}/>
				</div>
			</div> 
        )
    }
};

class ShortcodeVideo extends React.Component{
	constructor(props) {
		super(props);
		this.state = { 
			settings: this.props.settings,
		};
	}
	componentDidUpdate() {
	}
	componentDidMount() {
	}
	
	render() {
        return (
			<div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated bb-video">
				<video window="100%" height="100%"
				poster={this.state.settings.poster} 
				src={this.state.settings.video} 
				controls={this.state.settings.controls}
				autoplay={this.state.settings.autoplay}
				loop={this.state.settings.loop}
				muted={this.state.settings.muted}
				loop={this.state.settings.loop}
				></video>
			</div>
        )
    }
};

class ShortcodeAudio extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	componentDidMount() {
		var thiss = this;
        (function($) {

        }(window.jQuery));
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated bb-audio">
				<audio 
				className={this.state.settings.classCSS}
				src={this.state.settings.audio} 
				controls={this.state.settings.controls}
				autoplay={this.state.settings.autoplay}
				loop={this.state.settings.loop}
				muted={this.state.settings.muted}
				></audio>
			</div>
        )
    }
};

class ShortcodeSVG extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
		this.componentDidMount = this.componentDidMount.bind(this);
	}
	componentDidMount() {
		var thiss = this;
        (function($) {
			var request = new XMLHttpRequest();
			request.open('GET', thiss.state.settings.svg , true);
			request.send(null);
			request.onreadystatechange = function () {
				if (request.readyState === 4 && request.status === 200) {
					var type = request.getResponseHeader('Content-Type');
					if (type.indexOf("text") !== 1) {
						$('#bb-vcvs-demo-element').html(request.responseText);
					}
				}
			}
		}(window.jQuery));
	}
	componentDidUpdate() {
		var thiss = this;
        (function($) {
			var request = new XMLHttpRequest();
			request.open('GET', thiss.state.settings.svg , true);
			request.send(null);
			request.onreadystatechange = function () {
				if (request.readyState === 4 && request.status === 200) {
					var type = request.getResponseHeader('Content-Type');
					if (type.indexOf("text") !== 1) {
						$('#bb-vcvs-demo-element').html(request.responseText);
					}
				}
			}
		}(window.jQuery));
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className={'bb-vcvs-demo-element animated bb-svg ' + this.state.settings.classCSS}>
			</div>
        )
    }
};

class ShortcodeShape extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	componentDidMount() {
		var thiss = this;
        (function($) {
        }(window.jQuery));
	}
	render() {
        return (
			<div id="bb-vcvs-demo-element" className={ "bb-vcvs-demo-element animated bb-shape " + this.state.settings.classCSS} >
			</div>
        )
    }
}

class ElementScroll extends React.Component {
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
	render(){
		switch (this.props.settings.shortcodeSelected) {
			case 'text':
				return(
					<div>
					<ShortcodeText settings={this.state.settings.shortcode.text}></ShortcodeText>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Text <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'img':
				return(
					<div>
					<ShortcodeImg settings={this.state.settings.shortcode.img}></ShortcodeImg>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Image <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'button':
				return(
					<div>
					<ShortcodeBottom settings={this.state.settings.shortcode.button}></ShortcodeBottom>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Button <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'sequence':
				return(
					<div>
					<ShortcodeSequnce settings={this.state.settings.shortcode.sequence}></ShortcodeSequnce>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Sequence Images <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'video':
				return(
					<div>
					<ShortcodeVideo settings={this.state.settings.shortcode.video}></ShortcodeVideo>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Video <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'audio':
				return(
					<div>
					<ShortcodeAudio settings={this.state.settings.shortcode.audio}></ShortcodeAudio>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Audio <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'svg':
				return(
					<div>
					<ShortcodeSVG settings={this.state.settings.shortcode.svg}></ShortcodeSVG>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show draw SVG <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			case 'shape':
				return(
					<div>
					<ShortcodeShape settings={this.state.settings.shortcode.shape}></ShortcodeShape>
					<div className="bb-desc-text"><strong>With this type, You can add this shortcode <i>[bb_scrollmagic_scene id="SCENE_ID"]</i> to your content to show Shape <br/> or add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
			default:
				return(
					<div>
					<div id="bb-vcvs-demo-element-container"><div id="bb-vcvs-demo-element" className="bb-vcvs-demo-element animated">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</div></div>
					<div className="bb-desc-text"><strong>With this type, ScrollMagic just create effects and you need add <i>Class CSS (unique)</i> to any element in your website</strong></div>
					</div>
				);
				break;
		}
    }
}

class BBSceneSettings extends React.Component{
	constructor(props) {
		super(props);
		var settings = this.props.settings;
		if(this.props.edit != '') {
			settings = jQuery.extend( true, this.props.settings, this.props.edit );
		}
		this.state = { settings: settings };
		this.getChecked = this.getChecked.bind(this);
		this.onChange = this.onChange.bind(this);
		this.onChangeGeneral = this.onChangeGeneral.bind(this);
		this.onChangeInit = this.onChangeInit.bind(this);
		this.onChangeScroll = this.onChangeScroll.bind(this);
		this.onChangeEase = this.onChangeEase.bind(this);
		this.onChangeClass = this.onChangeClass.bind(this);
		this.onChangeMisc = this.onChangeMisc.bind(this);
		this.updateState = this.updateState.bind(this);
		this.addBezier = this.addBezier.bind(this);
		this.removeBezier = this.removeBezier.bind(this);
		this.upBezier = this.upBezier.bind(this);
		this.downBezier = this.downBezier.bind(this);
		this.changeXBezier = this.changeXBezier.bind(this);
		this.changeYBezier = this.changeYBezier.bind(this);
		this.saveScene = this.saveScene.bind(this);
		this.openPreview = this.openPreview.bind(this);
		this.componentDidMount = this.componentDidMount.bind(this);
		this.openRightBar = this.openRightBar.bind(this);
		this.exportData = this.exportData.bind(this);
		this.importData = this.importData.bind(this);
		this.onChangeShortcode = this.onChangeShortcode.bind(this);
	}
    
    getChecked(val){
        return (val == 'on' || val == true || val == "true") ? 1 : 0;
    }

    onChange(event) {
        var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        var name = target.name;

		var oldSettings = this.state.settings;
		var newSettings = {[name]: value};
		newSettings = jQuery.extend( true, oldSettings, newSettings );

        this.setState({settings: newSettings});
    }
	onChangeGeneral(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        if(target.type == 'checkbox') {
            value = (target.checked) ? 'on' : 'off';
        }
        var name = target.name;
        if(target.type == 'checkbox' && (name=='pushFollowers' || name=='reverse')) {
            value = (target.checked) ? true : false;
        }
		var oldSettings = this.state.settings;
		var newSettings = { general: {[name]: value} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );
        this.setState({settings: newSettings});
	}
	onChangeInit(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        var name = target.name;
		var oldSettings = this.state.settings;
		var newSettings = { init: {[name]: value} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );
        this.setState({settings: newSettings});
	}
	onChangeScroll(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        var name = target.name;
		var oldSettings = this.state.settings;
		var newSettings = { scroll: {[name]: value} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );

		this.setState({settings: newSettings});
	}
	onChangeEase(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        var name = target.name;
		var oldSettings = this.state.settings;
		var newSettings = { ease: {[name]: value} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );
        this.setState({settings: newSettings});
	}
	onChangeClass(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        if(target.type == 'checkbox') {
            value = (target.checked) ? 'on' : 'off';
        }
        var name = target.name;
		var oldSettings = this.state.settings;
		var newSettings = { class: {[name]: value} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );
        this.setState({settings: newSettings});
	}

	onChangeMisc(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        if(target.type == 'checkbox') {
            value = (target.checked) ? 'on' : 'off';
        }
        var name = target.name;
		var oldSettings = this.state.settings;
		var newSettings = { misc: {[name]: value} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );
        this.setState({settings: newSettings});
	}

	onChangeShortcode(event){
		var target = event.target;
		var value = target.type === 'checkbox'
			? target.checked
			: target.value;
		var name = target.name;
		var oldSettings = this.state.settings;
		var newSettings = { shortcode: {[this.state.settings.shortcodeSelected]:{[name]: value}} };
		newSettings = jQuery.extend( true, oldSettings, newSettings );
		this.setState({settings: newSettings});
	}

	updateState(newSettings){
		var oldSettings = this.state.settings;
		newSettings = jQuery.extend( true, oldSettings, newSettings );
        this.setState({settings: newSettings});
	}


	addBezier(){
		var newSettings = this.state.settings.bezier.push({x: 0, y: 0});
		this.updateState(newSettings);
	}

	removeBezier(index){
		this.state.settings.bezier.splice(index, 1);
		this.updateState({bezier: this.state.settings.bezier});
	}

	upBezier(index){
		if(index == 0) {
			return;
		}

		var tmp = this.state.settings.bezier[index - 1];
		this.state.settings.bezier[index - 1] = this.state.settings.bezier[index];
		this.state.settings.bezier[index] = tmp;

		this.updateState({bezier: this.state.settings.bezier});
	}

	downBezier(index){
		if(index == this.state.settings.bezier.length - 1) {
			return;
		}
		var tmp = this.state.settings.bezier[index + 1];
		this.state.settings.bezier[index + 1] = this.state.settings.bezier[index];
		this.state.settings.bezier[index] = tmp;

		this.updateState({bezier: this.state.settings.bezier});
	}

	changeXBezier(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        var name = target.name;
		var index = target.getAttribute('data-index');
		this.state.settings.bezier[index].x = value;
        this.updateState({bezier: this.state.settings.bezier});
	}

	changeYBezier(event){
		var target = event.target;
        var value = target.type === 'checkbox'
            ? target.checked
            : target.value;
        var name = target.name;
		var index = target.getAttribute('data-index');
		this.state.settings.bezier[index].y = value;
        this.updateState({bezier: this.state.settings.bezier});
	}

	saveScene(){
		var thiss = this;
		jQuery('.bb-ajax-loading').css({display: 'flex'});

        if(this.state.settings.general.title == '') {
			jQuery('.bb-ajax-loading').css({display: 'none'});
			jQuery.growl( {title: "Warning", message: "Please enter Scene title", location :"tc", style: 'warning' });
			return;
		}
        
        if(this.state.settings.general.name == '') {
			jQuery('.bb-ajax-loading').css({display: 'none'});
            jQuery.growl( {title: "Warning", message: "Please enter Class CSS (unique)", location :"tc", style: 'warning' });
			return;
		}

		jQuery.post(
		    ajaxurl,
		    {
		        'action': 'update_scene',
		        'data':   this.state.settings
		    },
		    function(response){
				response = JSON.parse(response);
				jQuery('.bb-ajax-loading').css({display: 'none'});
				if(typeof response.status != undefined && response.status == 'ok') {
                
                    parent.history.pushState("edit", "Edit", "?page=bbsm-add-scene&idScene="+response.scene_id);
					thiss.updateState({ scene_id: response.scene_id });
                    thiss.updateState({ general: { name: response.name } });
                    jQuery.growl( {title: "Successful", message: response.msg, location :"tc", style: 'notice' });
				} else {
					jQuery.growl( {title: "Fail", message: response.msg, location :"tc", style: 'error' });
				}
		    }
		);
	}
	openPreview(){
		(function($) {
			var $previewBox = $('#bb-vcvs-preview-container');
            if ($previewBox.length > 0) {
					if($previewBox.hasClass('active')) {
						$previewBox.removeClass('active');
					} else {
						$previewBox.addClass('active');
					}
            }
        }(window.jQuery));	
	}
	ruler(){
		$('.bbsm-ruler-top .bbsm-ruler-line').html('');
		var topOffset = ($('#bb-scroll-preview-container').innerWidth()/2) - ($('#bb-vcvs-demo-element').width()/2) -10 ;
		var widthAll = $('.bbsm-ruler-top').width()-topOffset;

		$('.bbsm-ruler-top .bbsm-ruler-line').css('width', widthAll).css('left', topOffset );
		for (var i = 0; i < topOffset/10; i++){
			var style = `left:${(-i*10)}px;`;
			var value = '';
			if (i%10 ==0 && i !==0) {
				style +=' height:15px;';
				value = `<span>${-i*10}</span>`;
			}
			$('.bbsm-ruler-top .bbsm-ruler-line').prepend(`
				<div style="${style}">${value}</div>
			`);
		}
		for (var i = 0; i < widthAll/10; i++){
			var style = `left:${(i*10)}px;`;
			var value = '';
			if (i%10 ==0) {
				style +=' height:15px;';
				value = `<span>${i*10}</span>`;
			}
			$('.bbsm-ruler-top .bbsm-ruler-line').append(`
				<div style="${style}">${value}</div>
			`);
		}
		
		let parent = $('#bb-scroll-preview-container')[0];
		parent.onmouseover = parent.onmouseout = parent.onmousemove = handler;
		function handler(event) {
			let type = event.type;
			while (type < 11) type += ' ';
				$('.wpsg-ruler-top-position-mouse').css('left',event.pageX - $('#bb-scroll-preview-container').offset().left );
				$('.wpsg-ruler-left-position-mouse').css('top',event.pageY - $('#bb-scroll-preview-container').offset().top );
			return false;
		}

		$('.bbsm-ruler-left .bbsm-ruler-line').html('');

		var leftOffset = 520;
		var heightAll = $('.bbsm-ruler-left').height()-leftOffset -20;
		$('.bbsm-ruler-left .bbsm-ruler-line').css('height', heightAll).css('top', leftOffset );
		for (var i = 0; i < leftOffset/10; i++){
			var style = `top:${(-i*10)}px;`;
			var value = '';
			if (i%10 ==0 && i !==0) {
				style +=' width:15px;';
				value = `<span>${-i*10}</span>`;
			}
			$('.bbsm-ruler-left .bbsm-ruler-line').prepend(`
				<div style="${style}">${value}</div>
			`);
		}
		for (var i = 0; i < heightAll/10; i++){
			var style = `top:${(i*10)}px;`;
			var value = '';
			if (i%10 ==0) {
				style +=' width:15px;';
				value = `<span>${i*10}</span>`;
			}
			$('.bbsm-ruler-left .bbsm-ruler-line').append(`
				<div style="${style}">${value}</div>
			`);
		}
	}
	componentDidUpdate() {
		//this.ruler();
	}
    componentDidMount() {
		var thiss = this;
		this.ruler();
        (function($) {
			//choose img
			$('.select-img').on('click', function(e){
				var target = event.target;
				var name = target.name;
				var oldSettings = thiss.state.settings;
				var seft = this;
				e.preventDefault();
				var frame = wp.media({
				  title: 'Choose image',
				  button: {
					text: 'Use this image'
				  },
				  multiple: false 
				});
				frame.on( 'select', function() {
				  	var attachment = frame.state().get('selection').first().toJSON();
					var newSettings = { shortcode: {[thiss.state.settings.shortcodeSelected]:{[name]: attachment.url}} };
					newSettings = jQuery.extend( true, oldSettings, newSettings );
					thiss.setState({settings: newSettings});
				});
				frame.open();
			})

			// import scene
			$('.import-from-template').on('click',function(){
				function inTemplates(scenes,number=15) {
					var dataSource = $.map( scenes , function( val, ind ) {
						return ind;
					});
					var dataCode = $('.dropdown-layer-li.import-from-template').attr('data-code');
					var buttomImport = '';
					if(dataCode != 'false'){
						buttomImport= ` <i class="scrollyicon scrollyicon-save_alt"></i> 
							<input type="hidden" class="wpsg-scene-inport" >`;
					}else{
						buttomImport= `<i title="Setting purchase code now" class="scrollyicon scrollyicon-highlight_remove"></i> `;
					}
					$('.wpsg-import-footer-pagination-container').pagination({
						dataSource: dataSource,
						pageSize: number,
						showPrevious: false,
						showNext: false,
						callback: function(data, pagination) {
							// template method of yourself
							var html ='';
							$.each(data,function(i,v){
								html += (`
									<li class="wpsg-scene">
										<div class="wpsg-scene-avater" style="background-image: url('https://bestbug.net/api/scrollmagic/templates/imgs/${scenes[v].img}');"></div>
										<div class=" wpsg-scene-info">
											<h2 class="wpsg-scene-name">${scenes[v].name}</h2>
											<span class="wpsg-scene-tag">SCENE</span>
											<div class="wpsg-scene-import">
												<div class="wpsg-scene-import-function">
													<a class="preview-demo" target="_blank" href="http://scrollmagic.bestbug.net/${scenes[v].demo}">
														<i class="scrollyicon scrollyicon-remove_red_eyevisibility"></i> 
													</a>
													<a class="import-demo" data-demo="${scenes[v].file}">
													   ${buttomImport}
													</a>
												</div>
											</div>
										</div>
									</li>
								`);
							});
							$('ul.wpsg-scenes').html(html);
							//import data demo
							$('.import-demo .scrollyicon-save_alt').on('click',function(){
								$('.wpsg-all-scene').append(`
									<div class="wpsg-loading">
										<h1>
											Loading content ...
										</h1>
									</div>
								`);
								var seft = this;
								$.ajax({
									method: "POST",
									url: "https://bestbug.net/api/scrollmagic/templates/index.php",
									data: { 
										action: "get_scene",
										file: $(this).closest('.import-demo').attr("data-demo"),
										code: $('.import-from-template').attr("data-code"),
									}
								}).done(function( sceneJson ) {
									try {
										JSON.parse(sceneJson);
									} catch (e) {
										$('.wpsg-loading h1').html(`Envato purchase code is wrong. You need to go <a href="${settings_slug}" >here</span> to set.`);
										return false;
									}
									thiss.updateState(JSON.parse( sceneJson ));
									$('.wpsg-all-scene .wpsg-loading').remove();
									$('.wpsg-import-scene').removeClass('active');
								}).fail(function() {
									$('.wpsg-loading h1').html(`Envato purchase code is wrong. You need to go <a href="${settings_slug}" >here</a> to set.`);
								});
							})
							$('.import-demo .scrollyicon-highlight_remove').on('click',function(){
								document.location = settings_slug;
							})
						}
					})
		
				}
				function filter(scenes){
					var filter1 = $('input[type="radio"][name="category-scene"]:checked').val();
					var filter2 = $('.wpsg-search-scene').val();
					var filter3 = $('.wpsg-import-footer-pagination-number select').val();
					var dataReturn = $.map( scenes , function( val, ind ) {
						if ( (  filter1 =='all'  || val.category == filter1 ) && (!filter2 || val.name.indexOf(filter2) >-1) )  {
							return val;
						}
					});
					inTemplates(dataReturn,filter3);
				}
				$('.wpsg-import-scene').addClass('active');
				$('.wpsg-all-scene').append(`
					<div class="wpsg-loading">
						<h1>
							Loading content ...
						</h1>
					</div>
				`);
				$.ajax({
					method: "POST",
					url: "https://bestbug.net/api/scrollmagic/templates/index.php",
					data: { 
						action: "get_all_scene",
					}
				}).done(function( res ) {
					$('.wpsg-all-scene .wpsg-loading').remove();
					var scenes = JSON.parse(res);
					var categories = [];
					inTemplates(scenes);
					$('.wpsg-import-right-bar .right-bar-filter-categiry').html(`
						<li>
							<label>
								<input type="radio" name="category-scene" checked="checked" value="all">
								<span>All</span>
							</label>
						</li>
					`);
					$.each(scenes, function(index, scene){
						if($.inArray(scene.category, categories) == -1){
							categories.push(scene.category);
							$('.wpsg-import-right-bar .right-bar-filter-categiry').append(`
							<li>
								<label>
									<input type="radio" name="category-scene" value="${scene.category}">
									<span>${scene.category}</span>
								</label>
							</li>`);
						};
					});
					$('.wpsg-search-scene').on('input change', function(){
						filter(scenes);
					});
					$('input[type="radio"][name="category-scene"]').on('change',  function(){
						filter(scenes);
					});
					$('.wpsg-import-footer-pagination-number select').on('input change',  function(){
						filter(scenes);
					});
				});
			})
	
			// close tab import
			$('.wpsg-import-top-bar .scrollyicon-clearclose').on('click', function(e) {
				$('.wpsg-import-scene').removeClass('active');
			})

			// select font
			$('[name="fontFamily"]').fontselect()
			.on('change', function() {
				var font = this.value.replace(/\+/g, ' ');
				var oldSettings = thiss.state.settings;
				var newSettings = { shortcode: {[thiss.state.settings.shortcodeSelected]:{fontFamily: font }} };
				newSettings = jQuery.extend( true, oldSettings, newSettings );
				thiss.setState({settings: newSettings});
			});

			$('.select-imgs').on('click', function(e){
				var oldSettings = thiss.state.settings;
			 	var seft = this;
				e.preventDefault();
				var frames = wp.media({
				  title: 'Choose image',
				  button: {
					text: 'Use this image'
				  },
				  multiple: true 
				});
				frames.on( 'select', function() {
					var attachments = frames.state().get('selection').toJSON();
					var values = attachments.map( img => img.url );
					var newSettings = { shortcode: {[thiss.state.settings.shortcodeSelected]:{images: values }} };
					newSettings = jQuery.extend( true, oldSettings, newSettings );
					thiss.setState({settings: newSettings});
				});
				frames.open();
			})

			//resize
			$( "#bb-scroll-preview" ).resizable({
				minWidth:1000,
				handles: "e"
			});
			$('.open-close-sidebar').on('click', function(){
				if($(this).hasClass('open')){
					$( "#bb-scroll-preview" ).css('width','calc(100%)');
					$(this).removeClass('open');
				}else{
					$( "#bb-scroll-preview" ).css('width','calc(100% - 320px)');
					$(this).addClass('open');
				}
				$(this).find('i').toggleClass('scrollyicon-remove_red_eyevisibility').toggleClass('scrollyicon-visibility_off');
			});

			// perfect Scroll
			// new PerfectScrollbar('#bb-scroll-preview-container',{
			// 	wheelSpeed : 0.5,
			// 	swipeEasing :true , 
			// });

			var $bb_tabs = $('h3.label-tab-content');
			if ($bb_tabs.length > 0) {
				$bb_tabs.on('click', function(e) {
					$(this).toggleClass('unactive').toggleClass('active');
					$(this).next('.tab-content').toggleClass('unactive').toggleClass('active');
				})
			}
            var $bb_box_title = $('.bb-toolbar-right a');
            if ($bb_box_title.length > 0) {
                $bb_box_title.on('click', function() {
					$bb_box_title.removeClass('active');
					$(this).addClass('active');
					switch ($(this).attr('data-id')) {
						case 'bb-vcvs-general-settings':
							$('#bb-vcvs-general-settings').removeClass('bb-minimal');
							$('#bb-vcvs-bs-settings').addClass('bb-minimal');
							$('#bb-vcvs-as-settings').addClass('bb-minimal');
							$('#bb-vcvs-sc-settings').addClass('bb-minimal');
							break;
						case 'bb-vcvs-sc-settings':
							$('#bb-vcvs-sc-settings').removeClass('bb-minimal');
							$('#bb-vcvs-bs-settings').addClass('bb-minimal');
							$('#bb-vcvs-as-settings').addClass('bb-minimal');
							$('#bb-vcvs-general-settings').addClass('bb-minimal');
							break;
						case 'bb-vcvs-bs-settings':
							$('#bb-vcvs-bs-settings').removeClass('bb-minimal');
							$('#bb-vcvs-as-settings').addClass('bb-minimal');
							$('#bb-vcvs-general-settings').addClass('bb-minimal');
							$('#bb-vcvs-sc-settings').addClass('bb-minimal');
							break;
						case 'bb-vcvs-as-settings':
							$('#bb-vcvs-as-settings').removeClass('bb-minimal');
							$('#bb-vcvs-general-settings').addClass('bb-minimal');
							$('#bb-vcvs-bs-settings').addClass('bb-minimal');
							$('#bb-vcvs-sc-settings').addClass('bb-minimal');
							break;
						default:
							break;
					}
                });
            }

			// Color picker
			$('.bb-field-color').wpColorPicker({
				change: function(event, ui){
					var element = event.target;
        			var color = ui.color.toString();

					// Fire trigger change in Reactjs
					setTimeout(function(){
						if($(element).hasClass('init')) {
							thiss.onChangeInit(event);
						}else if ($(element).hasClass('misc')) {
							thiss.onChangeMisc(event);
						} else {
							thiss.onChangeScroll(event);
						}
					}, 100);
				}
			});

        }(window.jQuery));

    }
	openRightBar(){
		$('#wpwrap', parent.document).addClass('bbsm-right-bar-active');
		$('.bb-content').addClass('bbsm-right-bar-unactive');
		$('.bb-content.bbsm-right-bar-unactive').on('click', function() {
			$('#wpwrap', parent.document).removeClass('bbsm-right-bar-active');
        })
	}
	exportData(){
		let dataStr = JSON.stringify(dataScroll);
		let dataUri = 'data:application/json;charset=utf-8,'+ encodeURIComponent(dataStr);
		let exportFileDefaultName = dataScroll.general.title+'.json';
		let linkElement = document.createElement('a');
		linkElement.setAttribute('href', dataUri);
		linkElement.setAttribute('download', exportFileDefaultName);
		linkElement.click();
	}
	importData(evt){
		var seft = this;
		var f = evt.target.files[0];
		if (f) {
			var r = new FileReader();
			r.onload = function(e) { 
				var json = JSON.parse(e.target.result);
				delete json['scene_id'];
				seft.updateState(json);
			}
			r.readAsText(f);
		} else { 
			console.log("Failed to load file");
		}
	}
    render() {

        return (
			<div className="bbvcvs-wrapper">
                <div className="bbsm-top-bar">
					<ul className="bbsm-top-bar-ul">
						<li className="bbsm-top-bar-li bbsm-open-right-bar border-right">
							<a href="javascript:;" onClick={this.openRightBar}>
								<i className="fa fa-wordpress"></i>
							</a>
						</li>
						<li className="bbsm-top-bar-li bbsm-back">
							<a  href={adminUrl}>
								<i className="fa fa-th"></i>
								<span>Back</span>
							</a>
						</li>
						<li className="bbsm-top-bar-li dropdown">
								<a>
									<i className="fa fa-upload "></i>
									<span>Import</span>
									<div className="dropdown-layers">
										<ul className="dropdown-layer">
											<li className="dropdown-layer-li">
												<label>
													<i className="scrollyicon scrollyicon-redo"></i>
													<span>Import from File</span>
													<input type="file" onChange={this.importData}/>
												</label>
											</li>
											<li className="dropdown-layer-li import-from-template" data-code={purchaseCode}>
												<i className="scrollyicon scrollyicon-folder"></i>
												<span>Import from Template</span>
											</li>
										</ul>
									</div>
								</a>
						</li>
						<li className="bbsm-top-bar-li border-right ">
							<a onClick={this.exportData}>
								<i className="fa fa-download"></i>
								<span>Export</span>
							</a>
						</li>
						<li className="bbsm-top-bar-li  bbsm-layer dropdown border-right  border-left">
							<a>
								<i className={this.state.settings.shortcodeSelected? 'scrollyicon '+this.state.settings.shortcode[this.state.settings.shortcodeSelected].icon:"scrollyicon scrollyicon-layers"}></i>
								<span>{this.state.settings.shortcodeSelected?"Type Of Scene: " + this.state.settings.shortcode[this.state.settings.shortcodeSelected].name:'Choose Type Of Scene'}</span>
								<div className="dropdown-layers">
									<ul className="dropdown-layer">
									<li onClick={()=>{ this.state.settings.shortcodeSelected = null; this.setState(this.state)}} className="dropdown-layer-li"> <i className="scrollyicon scrollyicon-layers"></i> None</li>
										{
											Object.keys(this.state.settings.shortcode).map((val) => <li onClick={()=>{ this.state.settings.shortcodeSelected = val; this.setState(this.state)}} className="dropdown-layer-li"> <i className={'scrollyicon '+this.state.settings.shortcode[val].icon}></i> {this.state.settings.shortcode[val].name}</li>)
										}
									</ul>
								</div>
							</a>
						</li>
						<li className="bbsm-top-bar-li open-close-sidebar open bbsm-preview fload-right">
							<a href="javascript:;">
								<i className="scrollyicon scrollyicon-remove_red_eyevisibility"></i>
								<span>Show/Hide</span>
							</a>
						</li>
						<li className="bbsm-top-bar-li bbsm-save fload-right">
							<a onClick={this.saveScene}>
								<i className="scrollyicon scrollyicon-save"></i>
								<span>Save</span>
							</a>
						</li>
					</ul>
                </div>
	            <div className="bb-content">
					
	                <BBScenePreview settings={this.state.settings} text={this.props.text} />
                    <div className="bb-col-settings-container">
						<div className="bb-toolbar-right">
							<a data-id="bb-vcvs-general-settings" className="active">
								<i className="scrollyicon scrollyicon-settings"></i>
								<span> General </span>
							</a>
							<a data-id="bb-vcvs-sc-settings" >
								<i className="scrollyicon scrollyicon-createmode_editedit"></i>
								<span> Content </span>
							</a>
							<a data-id="bb-vcvs-bs-settings" >
								<i className="scrollyicon scrollyicon-system_update_alt active"></i>
								<span> Before Scroll </span>
							</a>	
							<a data-id="bb-vcvs-as-settings" >
								<i className="scrollyicon scrollyicon-system_update_alt "></i>
								<span> On Scroll </span>
							</a> 
						</div>
    	                <div id="bb-vcvs-general-settings" className="bb-col-settings ">
    	                    <div className="inside tabs-container">
								<h3 className="label-tab-content active">{this.props.text.general}</h3>
    	                        <div id="bb-vcvs-general" className="tab-content active">
									<fieldset>
										<legend>Required:</legend>
										<span className="bb-label">Scene Title</span>
										<input type="text" className="bb-field" name="title" value={this.state.settings.general.title} onChange={this.onChangeGeneral} />
										<div className="clear"></div>
										
										<span className="bb-label">Class CSS (unique)</span>
										<input type="text" className="bb-field" name="name" value={this.state.settings.general.name} onChange={this.onChangeGeneral} />
										<div className="clear"></div>
                                    </fieldset>
                                    
                                    <span className="bb-label">Point to Start</span>
    	                            <select className="bb-field" name="triggerElement" value={this.state.settings.general.triggerElement} onChange={this.onChangeGeneral} >
                                        <option value="">Default</option>
    	                                <option value="top-document">Top of Page</option>
                                    </select>
                                    <div className="clear"></div>

    								<span className="bb-label">Trigger Hook</span>
    								<div className="range-slider">
    									<input className="range-slider__range" name="triggerHook" type="range" defaultValue={this.state.settings.general.triggerHook} min="0" max="1" step="0.01"  onChange={this.onChangeGeneral} />
										<span className="range-slider__value">
											<input type="number" min="0" max="1" step="0.01" className="bb-field" name="triggerHook" value={this.state.settings.general.triggerHook} onChange={this.onChangeGeneral} />
										</span>
    								</div>
    	                            <div className="clear"></div>

    								<span className="bb-label">Duration</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="duration" value={this.state.settings.general.duration} onChange={this.onChangeGeneral} />
										<span>px</span>
									</div>
    	                            <div className="clear"></div>

                                    <span className="bb-label">Offset</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="offset" value={this.state.settings.general.offset} onChange={this.onChangeGeneral} />
										<span>px</span>
									</div>
    	                            <div className="clear"></div>
    	                            <div className="clear"></div>
									
									<div className="border-field">
										<span className="bb-label">Reverse</span>
										<label className="switch">
										<input name="reverse" onChange={this.onChangeGeneral} type="checkbox" checked={this.getChecked(this.state.settings.general.reverse)} />
										<span className="slider round"></span>
										</label>
									</div>
                                    <div className="clear"></div>
									
									<div className="border-field">
										<span className="bb-label">Vertical</span>
										<label className="switch">
										<input name="vertical" onChange={this.onChangeGeneral} type="checkbox" checked={this.getChecked(this.state.settings.general.vertical)} />
										<span className="slider round"></span>
										</label>
									</div>
    	                            <div className="clear"></div>
                                    
									<fieldset>
										<legend>Sticky:</legend>
										<div className="border-field">
											<span className="bb-label">Pin</span>
											<label className="switch">
												<input name="pin" onChange={this.onChangeGeneral} type="checkbox" checked={this.getChecked(this.state.settings.general.pin)} />
												<span className="slider round"></span>
											</label>
											
										</div>
										<div className="clear"></div>
										<div className={(this.state.settings.general.pin != 'on')?'bbsm-hide-field border-field':'border-field'}>
											<span className="bb-label">PushFollowers</span>
											<label className="switch">
											<input name="pushFollowers" onChange={this.onChangeGeneral} type="checkbox" checked={this.getChecked(this.state.settings.general.pushFollowers)} />
											<span className="slider round"></span>
											</label>
										</div>
									</fieldset>
										
                                    <div className="clear"></div>
    	                        </div>
    	                        <h3 className="label-tab-content active">{this.props.text.ease}</h3>
								<div id="bb-vcvs-ease" className="tab-content active">

    								<span className="bb-label">Duration ease</span>
									<div className="bb-field-suf">
										<input type="number" step="0.01" className="bb-field" name="duration" value={this.state.settings.ease.duration} onChange={this.onChangeEase} />
										<span>s</span>
									</div>
    	                            <div className="clear"></div>

    								<span className="bb-label">Delay</span>
									<div className="bb-field-suf">
										<input type="number" step="0.01" className="bb-field" name="delay" value={this.state.settings.scroll.delay} onChange={this.onChangeScroll} />
										<span>s</span>
									</div>
    	                            <div className="clear"></div>

    								<span className="bb-label">Type</span>
    	                            <select className="bb-field" name="ease" value={this.state.settings.scroll.ease} onChange={this.onChangeScroll} >
    	                                <option value="Power0.easeNone">Power0.easeNone</option>

    									<option value="Power1.easeIn">Power1.easeIn</option>
    									<option value="Power1.easeInOut">Power1.easeInOut</option>
    									<option value="Power1.easeOut">Power1.easeOut</option>

    									<option value="Power2.easeIn">Power2.easeIn</option>
    									<option value="Power2.easeInOut">Power2.easeInOut</option>
    									<option value="Power2.easeOut">Power2.easeOut</option>

    									<option value="Power3.easeIn">Power3.easeIn</option>
    									<option value="Power3.easeInOut">Power3.easeInOut</option>
    									<option value="Power3.easeOut">Power3.easeOut</option>

    									<option value="Power4.easeIn">Power4.easeIn</option>
    									<option value="Power4.easeInOut">Power4.easeInOut</option>
    									<option value="Power4.easeOut">Power4.easeOut</option>

    									<option value="Back.easeIn.config(1.7)">Back.easeIn</option>
    									<option value="Back.easeInOut.config(1.7)">Back.easeInOut</option>
    									<option value="Back.easeOut.config(1.7)">Back.easeOut</option>

    									<option value="Elastic.easeIn.config(1, 0.3)">Elastic.easeIn</option>
    									<option value="Elastic.easeInOut.config(1, 0.3)">Elastic.easeInOut</option>
    									<option value="Elastic.easeOut.config(1, 0.3)">Elastic.easeOut</option>

    									<option value="Bounce.easeIn">Bounce.easeIn</option>
    									<option value="Bounce.easeInOut">Bounce.easeInOut</option>
    									<option value="Bounce.easeOut">Bounce.easeOut</option>

    									<option value="SlowMo.ease.config(0.7, 0.7, false)">SlowMo</option>
    									<option value="SteppedEase.config(12)">Stepped</option>

    									<option value="Circ.easeIn">Circ.easeIn</option>
    									<option value="Circ.easeInOut">Circ.easeInOut</option>
    									<option value="Circ.easeOut">Circ.easeOut</option>

    									<option value="Expo.easeIn">Expo.easeIn</option>
    									<option value="Expo.easeInOut">Expo.easeInOut</option>
    									<option value="Expo.easeOut">Expo.easeOut</option>

    									<option value="Sine.easeIn">Sine.easeIn</option>
    									<option value="Sine.easeInOut">Sine.easeInOut</option>
    									<option value="Sine.easeOut">Sine.easeOut</option>

    	                            </select>
    	                            <div className="clear"></div>
    	                        </div>
    							<h3 className="label-tab-content active">{this.props.text.bezier}</h3>
								<div id="bb-vcvs-bezier" className="tab-content bb-two-label active">
    								{this.state.settings.bezier.map((item, index) => {
    									return (
    										<div>
    											<span onClick={() => this.upBezier(index)} className="btn-up-bezier dashicons dashicons-arrow-up-alt"></span>
    											<span onClick={() => this.downBezier(index)} className="btn-down-bezier dashicons dashicons-arrow-down-alt"></span>

    											<span className="bb-label">x :</span>
    			  	                            <input type="number" step="1" className="bb-field" name="x" value={item.x} data-index={index} onChange={this.changeXBezier} />
    											<span className="bb-label">y :</span>
    											<input type="number" step="1" className="bb-field" name="y" value={item.y} data-index={index} onChange={this.changeYBezier} />

    											<span onClick={() => this.removeBezier(index)} className="btn-remove-bezier dashicons dashicons-trash"></span>
    			  	                            <div className="clear"></div>
    										</div>
    									)
    							  	})}
    								<span onClick={this.addBezier} className="btn-add-bezier dashicons dashicons-plus"></span>
    							</div>
								<h3 className="label-tab-content active">{this.props.text.classes}</h3>
							    <div id="bb-vcvs-classes" className="tab-content active">
									<div className="border-field">
										<span className="bb-label">Enable add </span>
										<label className="switch">
										<input name="classToggleEnable" onChange={this.onChangeClass} type="checkbox" checked={this.getChecked(this.state.settings.class.classToggleEnable)} />
										<span className="slider round"></span>
										</label>
									</div>
										
                                    <div className="clear"></div>
									
									<div className={(this.state.settings.class.classToggleEnable != 'on')?'bbsm-hide-field':''}>
										<span className="bb-label">Class CSS</span>
										<select className="bb-field" name="classCSS" value={this.state.settings.class.classCSS} onChange={this.onChangeClass} >
											<optgroup label="Attention Seekers">
												<option value="bounce">bounce</option>
												<option value="flash">flash</option>
												<option value="pulse">pulse</option>
												<option value="rubberBand">rubberBand</option>
												<option value="shake">shake</option>
												<option value="swing">swing</option>
												<option value="tada">tada</option>
												<option value="wobble">wobble</option>
												<option value="jello">jello</option>
											</optgroup>
											<optgroup label="Bouncing Entrances">
												<option value="bounceIn">bounceIn</option>
												<option value="bounceInDown">bounceInDown</option>
												<option value="bounceInLeft">bounceInLeft</option>
												<option value="bounceInRight">bounceInRight</option>
												<option value="bounceInUp">bounceInUp</option>
											</optgroup>
											<optgroup label="Bouncing Exits">
												<option value="bounceOut">bounceOut</option>
												<option value="bounceOutDown">bounceOutDown</option>
												<option value="bounceOutLeft">bounceOutLeft</option>
												<option value="bounceOutRight">bounceOutRight</option>
												<option value="bounceOutUp">bounceOutUp</option>
											</optgroup>
											<optgroup label="Fading Entrances">
												<option value="fadeIn">fadeIn</option>
												<option value="fadeInDown">fadeInDown</option>
												<option value="fadeInDownBig">fadeInDownBig</option>
												<option value="fadeInLeft">fadeInLeft</option>
												<option value="fadeInLeftBig">fadeInLeftBig</option>
												<option value="fadeInRight">fadeInRight</option>
												<option value="fadeInRightBig">fadeInRightBig</option>
												<option value="fadeInUp">fadeInUp</option>
												<option value="fadeInUpBig">fadeInUpBig</option>
											</optgroup>
											<optgroup label="Fading Exits">
												<option value="fadeOut">fadeOut</option>
												<option value="fadeOutDown">fadeOutDown</option>
												<option value="fadeOutDownBig">fadeOutDownBig</option>
												<option value="fadeOutLeft">fadeOutLeft</option>
												<option value="fadeOutLeftBig">fadeOutLeftBig</option>
												<option value="fadeOutRight">fadeOutRight</option>
												<option value="fadeOutRightBig">fadeOutRightBig</option>
												<option value="fadeOutUp">fadeOutUp</option>
												<option value="fadeOutUpBig">fadeOutUpBig</option>
											</optgroup>
											<optgroup label="Flippers">
												<option value="flip">flip</option>
												<option value="flipInX">flipInX</option>
												<option value="flipInY">flipInY</option>
												<option value="flipOutX">flipOutX</option>
												<option value="flipOutY">flipOutY</option>
											</optgroup>
											<optgroup label="Lightspeed">
												<option value="lightSpeedIn">lightSpeedIn</option>
												<option value="lightSpeedOut">lightSpeedOut</option>
											</optgroup>
											<optgroup label="Rotating Entrances">
												<option value="rotateIn">rotateIn</option>
												<option value="rotateInDownLeft">rotateInDownLeft</option>
												<option value="rotateInDownRight">rotateInDownRight</option>
												<option value="rotateInUpLeft">rotateInUpLeft</option>
												<option value="rotateInUpRight">rotateInUpRight</option>
											</optgroup>
											<optgroup label="Rotating Exits">
												<option value="rotateOut">rotateOut</option>
												<option value="rotateOutDownLeft">rotateOutDownLeft</option>
												<option value="rotateOutDownRight">rotateOutDownRight</option>
												<option value="rotateOutUpLeft">rotateOutUpLeft</option>
												<option value="rotateOutUpRight">rotateOutUpRight</option>
											</optgroup>
											<optgroup label="Sliding Entrances">
												<option value="slideInUp">slideInUp</option>
												<option value="slideInDown">slideInDown</option>
												<option value="slideInLeft">slideInLeft</option>
												<option value="slideInRight">slideInRight</option>
											</optgroup>
											<optgroup label="Sliding Exits">
												<option value="slideOutUp">slideOutUp</option>
												<option value="slideOutDown">slideOutDown</option>
												<option value="slideOutLeft">slideOutLeft</option>
												<option value="slideOutRight">slideOutRight</option>
											</optgroup>
											<optgroup label="Zoom Entrances">
												<option value="zoomIn">zoomIn</option>
												<option value="zoomInDown">zoomInDown</option>
												<option value="zoomInLeft">zoomInLeft</option>
												<option value="zoomInRight">zoomInRight</option>
												<option value="zoomInUp">zoomInUp</option>
											</optgroup>
											<optgroup label="Zoom Exits">
												<option value="zoomOut">zoomOut</option>
												<option value="zoomOutDown">zoomOutDown</option>
												<option value="zoomOutLeft">zoomOutLeft</option>
												<option value="zoomOutRight">zoomOutRight</option>
												<option value="zoomOutUp">zoomOutUp</option>
											</optgroup>
											<optgroup label="Specials">
												<option value="hinge">hinge</option>
												<option value="rollIn">rollIn</option>
												<option value="rollOut">rollOut</option>
											</optgroup>
											<optgroup label="Custom Class CSS">
												<option value="custom">Custom</option>
											</optgroup>
										</select>										
										<div className="clear"></div>
									</div>
									<div className={(this.state.settings.class.classToggleEnable == 'on' && this.state.settings.class.classCSS == 'custom')?'':'bbsm-hide-field'}>
										<span className="bb-label">Custom Class CSS</span>
										<label className="bb-field">
										<input type="text" className="bb-field"  name="customClassCSS" value={this.state.settings.class.customClassCSS} onChange={this.onChangeClass}  />
										</label>
										<div className="clear"></div>
									</div>
    	                        </div>
    							<h3 className="label-tab-content active">Misc</h3>
								<div id="bb-vcvs-misc" className="tab-content active">
									<fieldset>
										<legend>Draw SVG:</legend>
										<div className="border-field">
											<span className="bb-label">Enable Draw</span>
											<label className="switch">
											<input name="drawSVG" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.drawSVG)} />
											<span className="slider round"></span>
											</label>
										</div>
										<div className="clear"></div>

										<div className={(this.state.settings.misc.drawSVG != 'on')?'bbsm-hide-field border-field':'border-field'}>
											<span className="bb-label">Unable fill</span>
											<label className="switch">
												<input name="unableFill" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.unableFill)} />
												<span className="slider round"></span>
											</label>
											<div className="clear"></div>
										</div>

										<div className={(this.state.settings.misc.drawSVG != 'on')?'bbsm-hide-field':''}>
											<span className="bb-label">Stroke</span>
											<label className="bb-field">
												<input type="text" className="bb-field bb-field-color misc" name="stroke" value={this.state.settings.misc.stroke}  onChange={this.onChangeMisc} />
											</label>
											<div className="clear"></div>
									  	</div>

										<div className={(this.state.settings.misc.drawSVG != 'on')?'bbsm-hide-field':''}>
											<span className="bb-label">Stroke width</span>
											<label className="bb-field">
											<input type="text" className="bb-field" placeholder="5" name="strokeWidth" value={this.state.settings.misc.strokeWidth} onChange={this.onChangeMisc} />
											</label>
											<div className="clear"></div>
										</div>
									</fieldset>

									<fieldset>
										<legend>Image Sequence:</legend>
										<div className="border-field">
											<span className="bb-label">Enable Image Sequence</span>
											<label className="switch">
												<input name="imageSequence" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.imageSequence)} />
												<span className="slider round"></span>
											</label>
										</div>
										<div className="clear"></div>

										<div className={(this.state.settings.misc.imageSequence != 'on')?'bbsm-hide-field':''}>
											<span className="bb-label">Repeat</span>
											<label className="bb-field">
											<input type="text" className="bb-field" placeholder="1" name="imageSequenceRepeat" value={this.state.settings.misc.imageSequenceRepeat} onChange={this.onChangeMisc} />
											</label>
											<div className="clear"></div>
										</div>
									</fieldset>
									
									<fieldset>
										<legend>Text Effect:</legend>
										<div className="border-field">
											<span className="bb-label">Enable Text Effect</span>
											<label className="switch">
												<input name="textDance" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.textDance)} />
												<span className="slider round"></span>
											</label>
										</div>
										<div className="clear"></div>

										<div className={(this.state.settings.misc.textDance != 'on')?'bbsm-hide-field':''}>
											<span className="bb-label">Style</span>
											<select className="bb-field" name="textDanceStyle" value={this.state.settings.class.textDanceStyle} onChange={this.onChangeMisc} >
												<option value="wave_from">Wave from</option>
												<option value="wave_to">Wave to</option>
												<option value="random_from">Random from</option>
												<option value="random_to">Random to</option>
											</select>
											<div className="clear"></div>
									  	</div>

										<div className={(this.state.settings.misc.textDance != 'on')?'bbsm-hide-field':''}>
											<span className="bb-label">Speed</span>
											<label className="bb-field">
											<input type="text" className="bb-field" name="textDanceSpeed" value={this.state.settings.misc.textDanceSpeed} onChange={this.onChangeMisc} />
											</label>
											<div className="clear"></div>
										</div>
									</fieldset>
									
									<fieldset>
										<legend>Video &#38; Audio:</legend>
										<div className="border-field">
											<span className="bb-label">Scroll To Play</span>
											<label className="switch">
												<input name="scrollToPlay" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.scrollToPlay)} />
												<span className="slider round"></span>
											</label>
										</div>

										<div className="border-field">
											<span className="bb-label">Time lapse</span>
											<label className="switch">
												<input name="timeLapse" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.timeLapse)} />
												<span className="slider round"></span>
											</label>
										</div>
									</fieldset>

    	                            <div className="clear"></div>
									
									<fieldset>
										<legend>JQuery Selector:</legend>
										<span className="bb-label">Selector</span>
										<label className="bb-field">
										<input type="text" className="bb-field" name="selector" value={this.state.settings.misc.selector} onChange={this.onChangeMisc} />
										</label>
										<div className="clear"></div>
										
										<span className="bb-label">Container</span>
										<label className="bb-field">
										<input type="text" className="bb-field" name="container" value={this.state.settings.misc.container} onChange={this.onChangeMisc} />
										</label>
										<div className="clear"></div>
										<span className="bb-label">Click To</span>
											<label className="bb-field">
											<input type="text" className="bb-field" name="clickTo" value={this.state.settings.misc.clickTo} onChange={this.onChangeMisc} />
											</label>
									</fieldset>
									
    	                            <div className="clear"></div>
									
									<fieldset>
										<legend>Responsive:</legend>
										<div className="border-field">
											<span className="bb-label">Disable on Mobile</span>
											<label className="switch">
												<input name="disableMobile" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.disableMobile)} />
												<span className="slider round"></span>
											</label>
										</div>
										
										<div className="clear"></div>
										<div className="border-field">
											<span className="bb-label">Disable on Desktop</span>
											<label className="switch">
												<input name="disableDesktop" onChange={this.onChangeMisc} type="checkbox" checked={this.getChecked(this.state.settings.misc.disableDesktop)} />
												<span className="slider round"></span>
											</label>
										</div>
									</fieldset>
									
									<div className="clear"></div>
                                    
    							</div>

    	                    </div>
    	                </div>
						<div id="bb-vcvs-sc-settings" className="bb-col-settings bb-minimal">
							{/* none */}
							<div className='inside tabs-container settings-type' data-select={(!this.state.settings.shortcodeSelected)?'true':'false'}>
								<div className="tab-content active">
									<div class="notification-select-layers">
										<i class="scrollyicon scrollyicon-error"></i>
										<span>Please Choose Type Of Scene</span>
									</div>
								</div>
							</div>

							{/* text */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='text'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">
									<span className="bb-label">Text</span>
									<textarea name="content" className="bb-field" cols="40" rows="5" onChange={this.onChangeShortcode} >{this.state.settings.shortcode.text.content}</textarea>
									<div className="clear"></div>

									<span className="bb-label">URL</span>
									<input type="text" className="bb-field"  name="URL" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['URL']}/>
									<div className="clear"></div>
									
									<span className="bb-label">Target</span>
									<select className="bb-field" name="target" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['target']!=''?this.state.settings.shortcode.text['target']:'_blank'}>
										<option value="_blank">_blank</option>
										<option value="_self">_self</option>
										<option value="_parent">_parent</option>
										<option value="_top">_top</option>
									</select>
									<div className="clear"></div>

									<span className="bb-label">Text align</span>
									<select className="bb-field" name="textAlign" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['textAlign']!=''?this.state.settings.shortcode.text['textAlign']:'left'}>
										<option value="left">Left</option>
										<option value="center">Center</option>
										<option value="right">Right</option>
										<option value="justify">Justify</option>
									</select>
									<div className="clear"></div>

									<span className="bb-label">Text transform</span>
									<select className="bb-field" name="textTransform" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['textTransform']!=''?this.state.settings.shortcode.text['textTransform']:'none'}>
										<option value="none">None</option>
										<option value="capitalize">Capitalize</option>
										<option value="uppercase">Uppercase</option>
										<option value="Lowercase">Lowercase</option>
										<option value="Initial">Ippercase</option>
										<option value="Inherit">Inherit</option>
									</select>
									<div className="clear"></div>

									<span className="bb-label">Letter spacing</span>
									<div className="bb-field-suf">
										<input type="text" className="bb-field" name="letterSpacing" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['letterSpacing']}/>
										<span>px</span>
									</div>
									<div className="clear"></div>

									<span className="bb-label">Line height</span>
									<div className="bb-field-suf">
										<input type="text" className="bb-field" name="lineHeight" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['lineHeight']}/>
										<span>px</span>
									</div>
									<div className="clear"></div>

									<span className="bb-label">Text decoration</span>
									<select className="bb-field" name="textDecoration" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['textDecoration']!=''?this.state.settings.shortcode.text['textDecoration']:'none'}>
										<option value="none">None</option>
										<option value="overline">Overline</option>
										<option value="line-through">Line-through</option>
										<option value="underline">Underline</option>
										<option value="underline overline">Underline Overline</option>
									</select>
									<div className="clear"></div>

									<span className="bb-label">Class CSS</span>
									<input type="text" className="bb-field" name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['classCSS']}/>
									<div className="clear"></div>

									<fieldset>
										<legend>Font:</legend>

										<span className="bb-label">Font size</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="fontSize" value={this.state.settings.shortcode.text['fontSize']}/>
										<div className="clear"></div>

										<span className="bb-label">Font family</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="fontFamily" value={this.state.settings.shortcode.text['fontFamily']}/>
										<div className="clear"></div>

										<span className="bb-label">Custom Font</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="cstFontFamily" value={this.state.settings.shortcode.text['cstFontFamily']}/>
										<div className="clear"></div>

										<span className="bb-label">Font Style</span>
										<select className="bb-field" name="fontStyle" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['fontStyle']!=''?this.state.settings.shortcode.text['fontStyle']:'normal'}>
											<option value="normal">Normal</option>
											<option value="italic">Italic</option>
											<option value="oblique">Oblique</option>
											<option value="initial">Initial</option>
											<option value="inherit">Inherit</option>
										</select>
										<div className="clear"></div>

										<span className="bb-label">Font weight</span>
										<select className="bb-field" name="fontWeight" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.text['fontWeight']!=''?this.state.settings.shortcode.text['fontWeight']:'400'} >
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="300">300</option>
											<option value="400">400</option>
											<option value="500">500</option>
											<option value="600">600</option>
											<option value="700">700</option>
											<option value="800">800</option>
											<option value="900">900</option>
										</select>
										<div className="clear"></div>
									</fieldset>

								</div>
							</div>
							
							{/* img */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='img'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">

									<span className="bb-label">Image</span>
									<input type="text" className="bb-field select-img" onChange={this.onChangeShortcode} name="image" value={this.state.settings.shortcode.img['image']}/>
									<div className="clear"></div>

									<span className="bb-label">URL</span>
									<input type="text" className="bb-field"  name="URL" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.img['URL']}/>
									<div className="clear"></div>
									
									<span className="bb-label">Target</span>
									<select className="bb-field" name="target" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.img['target']!=''?this.state.settings.shortcode.img['target']:'_blank'}>
										<option value="_blank">_blank</option>
										<option value="_self">_self</option>
										<option value="_parent">_parent</option>
										<option value="_top">_top</option>
									</select>
									<div className="clear"></div>
									
									<span className="bb-label">Alt</span>
									<input type="text" className="bb-field"  name="alt" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.img['alt']}/>
									<div className="clear"></div>

									<span className="bb-label">Class css</span>
									<input type="text" className="bb-field"  name="classCSS" onChange={this.onChangeShortcode}  value={this.state.settings.shortcode.img['classCSS']}/>
									<div className="clear"></div>

								</div>
							</div>

							{/* button */}		  
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='button'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">

									<span className="bb-label">Title</span>
									<input type="text" className="bb-field"  name="title" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['title']}/>
									<div className="clear"></div>

									<span className="bb-label">URL</span>
									<input type="text" className="bb-field"  name="URL" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['URL']}/>
									<div className="clear"></div>

									<span className="bb-label">Target</span>
									<select className="bb-field" name="target" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['target']!=''?this.state.settings.shortcode.button['target']:'_blank'}>
										<option value="_blank">Blank</option>
										<option value="_self">Self</option>
										<option value="_parent">Parent</option>
										<option value="_top">Top</option>
									</select>

									<span className="bb-label">Text transform</span>
									<select className="bb-field" name="textTransform" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['textTransform']!=''?this.state.settings.shortcode.button['textTransform']:'none'}>
										<option value="none">None</option>
										<option value="capitalize">Capitalize</option>
										<option value="uppercase">Uppercase</option>
										<option value="Lowercase">Lowercase</option>
										<option value="Initial">Ippercase</option>
										<option value="Inherit">Inherit</option>
									</select>
									<div className="clear"></div>

									<span className="bb-label">Letter spacing</span>
									<div className="bb-field-suf">
										<input type="text" className="bb-field" name="letterSpacing" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['letterSpacing']}/>
										<span>px</span>
									</div>
									<div className="clear"></div>

									<span className="bb-label">Line height</span>
									<div className="bb-field-suf">
										<input type="text" className="bb-field" name="lineHeight" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['lineHeight']}/>
										<span>px</span>
									</div>
									<div className="clear"></div>

									<span className="bb-label">Text decoration</span>
									<select className="bb-field" name="textDecoration" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['textDecoration']!=''?this.state.settings.shortcode.button['textDecoration']:'none'}>
										<option value="none">None</option>
										<option value="overline">Overline</option>
										<option value="line-through">Line-through</option>
										<option value="underline">Underline</option>
										<option value="underline overline">Underline Overline</option>
									</select>
									<div className="clear"></div>

									<span className="bb-label">Class css</span>
									<input type="text" className="bb-field"  name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['classCSS']}/>
									<div className="clear"></div>

									<fieldset>
										<legend>Font:</legend>

										<span className="bb-label">Font size</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="fontSize" value={this.state.settings.shortcode.button['fontSize']}/>
										<div className="clear"></div>

										<span className="bb-label">Font family</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="fontFamily" value={this.state.settings.shortcode.button['fontFamily']}/>
										<div className="clear"></div>

										<span className="bb-label">Custom Font</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="cstFontFamily" value={this.state.settings.shortcode.button['cstFontFamily']}/>
										<div className="clear"></div>

										<span className="bb-label">Font Style</span>
										<select className="bb-field" name="fontStyle" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['fontStyle']!=''?this.state.settings.shortcode.button['fontStyle']:'normal'}>
											<option value="normal">Normal</option>
											<option value="italic">Italic</option>
											<option value="oblique">Oblique</option>
											<option value="initial">Initial</option>
											<option value="inherit">Inherit</option>
										</select>
										<div className="clear"></div>

										<span className="bb-label">Font weight</span>
										<select className="bb-field" name="fontWeight" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['fontWeight']!=''?this.state.settings.shortcode.button['fontWeight']:'400'} >
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="300">300</option>
											<option value="400">400</option>
											<option value="500">500</option>
											<option value="600">600</option>
											<option value="700">700</option>
											<option value="800">800</option>
											<option value="900">900</option>
										</select>
										<div className="clear"></div>
									</fieldset>

									<fieldset>
										<legend>Icon:</legend>

										<span className="bb-label">Icon</span>
										<input type="text" className="bb-field"  name="iconButton" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.button['iconButton']}  placeholder="fa fa-icon"/>
										<div className="clear"></div>

										<span className="bb-label">Icon font size</span>
										<input type="text" className="bb-field" onChange={this.onChangeShortcode} name="iconFontSize" value={this.state.settings.shortcode.button['iconFontSize']}/>
										<div className="clear"></div>

									</fieldset>

								</div>
							</div>

							{/* Sequnce */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='sequence'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">
									
									<span className="bb-label">Images</span>
									<div className="sequence-imgs">
										{ this.state.settings.shortcode.sequence.images
										?this.state.settings.shortcode.sequence.images.map((img,index) =>( 
											<div className="sequence-img" style={{background: `url(${img})` }} >
												<i className="scrollyicon scrollyicon-clearclose" onClick={()=> { this.state.settings.shortcode.sequence.images.splice(index, 1);this.setState( this.state );}}></i>
											</div>
										))
										:'' }
										<div name="imgs" className="choose-imgs select-imgs"><i name="imgs" class="fa fa-plus" aria-hidden="true"></i></div>
										<p className="clean-imgs" onClick={() => { this.state.settings.shortcode.sequence.images = [];this.setState( this.state ); }}>Clean</p>
									</div>
									<div className="clear"></div>

									<span className="bb-label">URL</span>
									<input type="text" className="bb-field"  name="URL" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.sequence['URL']}/>
									<div className="clear"></div>
									
									<span className="bb-label">Target</span>
									<select className="bb-field" name="target" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.sequence['target']!=''?this.state.settings.shortcode.sequence['target']:'_blank'}>
										<option value="_blank">_blank</option>
										<option value="_self">_self</option>
										<option value="_parent">_parent</option>
										<option value="_top">_top</option>
										<option value="framename">Framename</option>
									</select>
									<div className="clear"></div>
									
									<span className="bb-label">Alt</span>
									<input type="text" className="bb-field"  name="alt" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.sequence['alt']}/>
									<div className="clear"></div>

									<span className="bb-label">Class css</span>
									<input type="text" className="bb-field"  name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.sequence['classCSS']}/>
									<div className="clear"></div>

								</div>
							</div>

							{/* video */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='video'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">
									<span className="bb-label">Video</span>
									<input type="text" className="bb-field select-img select-img"  name="video" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.video['video']}/>
									<div className="clear"></div>

									<span className="bb-label">Poster</span>
									<input type="text" className="bb-field select-img"  name="poster" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.video['poster']}/>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Auto play</span>
										<label className="switch">
											<input type="checkbox"  name="autoplay" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.video['autoplay'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Controls</span>
										<label className="switch">
											<input type="checkbox"  name="controls" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.video['controls'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Loop</span>
										<label className="switch">
											<input type="checkbox"  name="loop" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.video['loop'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Muted</span>
										<label className="switch">
											<input type="checkbox"  name="muted" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.video['muted'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<span className="bb-label">Class css</span>
									<input type="text" className="bb-field"  name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.video['classCSS']}/>
									<div className="clear"></div>

								</div>	
							</div>

							{/* audio */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='audio'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">
									<span className="bb-label">Audio</span>
									<input type="text" className="bb-field select-img select-img"  name="audio" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.audio['audio']}/>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Auto play</span>
										<label className="switch">
											<input type="checkbox"  name="autoplay" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.audio['autoplay'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Controls</span>
										<label className="switch">
											<input type="checkbox"  name="controls" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.audio['controls'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Loop</span>
										<label className="switch">
											<input type="checkbox"  name="loop" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.audio['loop'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<div className="border-field">
										<span className="bb-label">Muted</span>
										<label className="switch">
											<input type="checkbox"  name="muted" onChange={this.onChangeShortcode} checked={this.getChecked(this.state.settings.shortcode.audio['muted'])} />
											<span className="slider round"></span>
										</label>
									</div>
									<div className="clear"></div>

									<span className="bb-label">Class css</span>
									<input type="text" className="bb-field"  name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.audio['classCSS']}/>
									<div className="clear"></div>
								</div>
							</div>

							{/* svg */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='svg'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">
									<span className="bb-label">SVG</span>
									<input type="text" className="bb-field select-img select-img"  name="svg" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.svg['svg']}/>
									<div className="clear"></div>
									
									<span className="bb-label">Class CSS</span>
									<input type="text" className="bb-field "  name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.svg['classCSS']}/>
									<div className="clear"></div>
								</div>
							</div>

							{/* Shape */}
							<div className='inside tabs-container settings-type' data-select={this.state.settings.shortcodeSelected=='shape'?'true':'false'}>
								<h3 className="label-tab-content active">Shortcode Content</h3>
								<div className="tab-content active">
									<span className="bb-label">Class CSS</span>
									<input type="text" className="bb-field"  name="classCSS" onChange={this.onChangeShortcode} value={this.state.settings.shortcode.shape['classCSS']}/>
									<div className="clear"></div>
								</div>
							</div>
						</div>	
                        <div id="bb-vcvs-bs-settings" className="bb-col-settings bb-minimal">
    	                    <div className="inside tabs-container">
								<h3 className="label-tab-content active">Transform</h3>
    							<div id="bb-vcvs-transform" className="tab-content active">
									<span className="bb-label">Transform Origin</span>
									<select className="bb-field" name="transformOrigin" value={this.state.settings.init.transformOrigin} onChange={this.onChangeInit} >
										<option value="">Default</option>
										<option value="0% 0%">top left</option>
										<option value="50% 0%">top center</option>
										<option value="100% 0%">top right</option>
										<option value="0% 50%">center left</option>
										<option value="50% 50%">center center</option>
										<option value="100% 50%">center right</option>
										<option value="0% 100%">bottom left</option>
										<option value="50% 100%">bottom center</option>
										<option value="100% 100%">bottom right</option>
									</select>
									<div className="clear"></div>

    								<span className="bb-label">TranslateX</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="x" value={this.state.settings.init.x} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">TranslateY</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="y" value={this.state.settings.init.y} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">TranslateZ</span>
										<div className="bb-field-suf">
										<input type="text" step="0.1" className="bb-field" name="z" value={this.state.settings.init.z} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">ScaleX</span>
    								<input type="number" step="0.5" className="bb-field" name="scaleX" value={this.state.settings.init.scaleX} onChange={this.onChangeInit} />
    								<div className="clear"></div>

    								<span className="bb-label">ScaleY</span>
    								<input type="number" step="0.5" className="bb-field" name="scaleY" value={this.state.settings.init.scaleY} onChange={this.onChangeInit} />
    								<div className="clear"></div>


    								<span className="bb-label">Rotate</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="rotation" value={this.state.settings.init.rotation} onChange={this.onChangeInit} />
										<span>deg</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">RotateX</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="rotationX" value={this.state.settings.init.rotationX} onChange={this.onChangeInit} />
										<span>deg</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">RotateY</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="rotationY" value={this.state.settings.init.rotationY} onChange={this.onChangeInit} />
										<span>deg</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">SkewX</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="skewX" value={this.state.settings.init.skewX} onChange={this.onChangeInit} />
										<span>deg</span>
									</div>
    								<div className="clear"></div>

    								<span className="bb-label">SkewY</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="skewY" value={this.state.settings.init.skewY} onChange={this.onChangeInit} />
										<span>deg</span>
									</div>
    								<div className="clear"></div>
                                    
    							</div>
                                <h3 className="label-tab-content active">Color</h3>
                                <div id="bb-vcvs-color" className="tab-content active">
    								<span className="bb-label">Color</span>
    								<input type="text" className="bb-field bb-field-color init" name="color" value={this.state.settings.init.color} onChange={this.onChangeInit} />
    								<div className="clear"></div>
                                    
    								<span className="bb-label">Background Color</span>
    								<input type="text" className="bb-field bb-field-color init" name="backgroundColor" value={this.state.settings.init.backgroundColor} onChange={this.onChangeInit} />
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">BG-Attachment</span>
                                    <select className="bb-field" name="backgroundAttachment" value={this.state.settings.init.backgroundAttachment} onChange={this.onChangeInit} >
    										<option value="">Default</option>
                                            <option value="scroll">Scroll</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="local">Local</option>
                                            <option value="initial">Initial</option>
                                            <option value="inherit">Inherit</option>
                                    </select>
                                    <div className="clear"></div>
                                </div>
                                <h3 className="label-tab-content active">Position</h3>
                                <div id="bb-vcvs-position" className="tab-content active">
                                    
                                    <span className="bb-label">Position</span>
                                    <select className="bb-field" name="position" value={this.state.settings.init.position} onChange={this.onChangeInit} >
    										<option value="">Default</option>
                                            <option value="relative">Relative</option>
                                            <option value="absolute">Absolute</option>
                                            <option value="fixed">Fixed</option>
                                    </select>
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Top</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="top" value={this.state.settings.init.top} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Left</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="left" value={this.state.settings.init.left} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Bottom</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="bottom" value={this.state.settings.init.bottom} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Right</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="right" value={this.state.settings.init.right} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>
                                </div>
                                <h3 className="label-tab-content active">Misc</h3>
                                <div id="bb-vcvs-bsmisc" className="tab-content active">
                                    
                                    <span className="bb-label">Width</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="width" value={this.state.settings.init.width} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Height</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="height" value={this.state.settings.init.height} onChange={this.onChangeInit} />
										<span>px</span>
									</div>
    								<div className="clear"></div>
                                    
    								<span className="bb-label">Opacity</span>    
                                    <div className="range-slider">
    									<input className="range-slider__range" name="opacity" type="range" defaultValue={this.state.settings.init.opacity} min="0" max="1" step="0.01"  onChange={this.onChangeInit} />
										<span className="range-slider__value">
											<input type="number" min="0" max="1" step="0.01" className="bb-field" name="opacity" value={this.state.settings.init.opacity} onChange={this.onChangeInit} />
										</span>
    								</div>
                                    <div className="clear"></div>
                                    
                                    <span className="bb-label">Blur</span>
                                    <input type="number" className="bb-field" name="blur" value={this.state.settings.init.blur} onChange={this.onChangeInit} />
                                    <div className="clear"></div>

                                    <span className="bb-label">Z-Index</span>
    								<input type="number" step="1" className="bb-field" name="zIndex" value={this.state.settings.init.zIndex} onChange={this.onChangeInit} />
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Overflow</span>
                                    <select className="bb-field" name="overflow" value={this.state.settings.init.overflow} onChange={this.onChangeInit} >
    										<option value="">Default</option>
                                            <option value="collapse">Collapse</option>
                                            <option value="hidden">Hidden</option>
                                            <option value="inherit">Inherit</option>
                                            <option value="initial">Initial</option>
                                            <option value="unset">Unset</option>
                                            <option value="visible">Visible</option>
                                    </select>
    								<div className="clear"></div>
                                    
                                    <span className="bb-label">Display</span>
                                    <select className="bb-field" name="display" value={this.state.settings.init.display} onChange={this.onChangeInit} >
    										<option value="">Default</option>
                                            <option value="block">Block</option>
                                            <option value="inline-block">Inline Block</option>
                                            <option value="none">None</option>
                                            <option value="flex">Flex</option>
                                            <option value="inline-flex">Inline Flex</option>
                                            <option value="inherit">Inherit</option>
                                            <option value="initial">Initial</option>
                                    </select>
    								<div className="clear"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="bb-vcvs-as-settings" className="bb-col-settings bb-minimal">
    	                    <div className="inside tabs-container">
                                <h3 className="label-tab-content active">Transform</h3>
                                <div id="bb-vcvsac-transform" className="tab-content active">

        							<span className="bb-label">TranslateX</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="x" value={this.state.settings.scroll.x} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">TranslateY</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="y" value={this.state.settings.scroll.y} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">TranslateZ</span>
									<div className="bb-field-suf">
										<input type="text" step="0.1" className="bb-field" name="z" value={this.state.settings.scroll.z} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">ScaleX</span>
                                    <input type="number" step="0.5" className="bb-field" name="scaleX" value={this.state.settings.scroll.scaleX} onChange={this.onChangeScroll} />
                                    <div className="clear"></div>

        							<span className="bb-label">ScaleY</span>
                                    <input type="number" step="0.5" className="bb-field" name="scaleY" value={this.state.settings.scroll.scaleY} onChange={this.onChangeScroll} />
                                    <div className="clear"></div>


        							<span className="bb-label">Rotate</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="rotation" value={this.state.settings.scroll.rotation} onChange={this.onChangeScroll} />
										<span>deg</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">RotateX</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="rotationX" value={this.state.settings.scroll.rotationX} onChange={this.onChangeScroll} />
										<span>deg</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">RotateY</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="rotationY" value={this.state.settings.scroll.rotationY} onChange={this.onChangeScroll} />
										<span>deg</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">SkewX</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="skewX" value={this.state.settings.scroll.skewX} onChange={this.onChangeScroll} />
										<span>deg</span>
									</div>
                                    <div className="clear"></div>

        							<span className="bb-label">SkewY</span>
									<div className="bb-field-suf">
										<input type="number" step="1" className="bb-field" name="skewY" value={this.state.settings.scroll.skewY} onChange={this.onChangeScroll} />
										<span>deg</span>
									</div>
                                    <div className="clear"></div>
                                    
                                </div>
                                <h3 className="label-tab-content active">Color</h3>
                                <div id="bb-vcvsac-color" className="tab-content active">
        							<span className="bb-label">Color</span>
        							<input type="text" className="bb-field bb-field-color" name="color" value={this.state.settings.scroll.color} onChange={this.onChangeScroll} />
                                    <div className="clear"></div>

                                    
        							<span className="bb-label">Background Color</span>
                                    <input type="text" className="bb-field bb-field-color" name="backgroundColor" value={this.state.settings.scroll.backgroundColor} onChange={this.onChangeScroll} />
                                    <div className="clear"></div>
                                    
                                    <span className="bb-label">BG-Attachment</span>
                                    <select className="bb-field" name="backgroundAttachment" value={this.state.settings.scroll.backgroundAttachment} onChange={this.onChangeScroll} >
                                        <option value="">Default</option>
                                        <option value="-webkit-paged-x">-webkit-paged-x</option>
                                        <option value="-webkit-paged-y">-webkit-paged-y</option>
                                        <option value="auto">auto</option>
                                        <option value="hidden">hidden</option>
                                        <option value="inherit">inherit</option>
                                        <option value="initial">initial</option>
                                        <option value="overlay">overlay</option>
                                        <option value="scroll">scroll</option>
                                        <option value="unset">unset</option>
                                        <option value="visible">visible</option>
                                    </select>
                                    <div className="clear"></div>
                                </div>
                                <h3 className="label-tab-content active">Position</h3>
                                <div id="bb-vcvsac-position" className="tab-content active">
                                    
                                    <span className="bb-label">Position</span>
                                    <select className="bb-field" name="position" value={this.state.settings.scroll.position} onChange={this.onChangeScroll} >
        									<option value="">Default</option>
                                            <option value="relative">Relative</option>
                                            <option value="absolute">Absolute</option>
                                            <option value="fixed">Fixed</option>
                                    </select>
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Top</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="top" value={this.state.settings.scroll.top} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Left</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="left" value={this.state.settings.scroll.left} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Bottom</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="bottom" value={this.state.settings.scroll.bottom} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Right</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="right" value={this.state.settings.scroll.right} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
        							<div className="clear"></div>
                                </div>
                                <h3 className="label-tab-content active">Misc</h3>
                                <div id="bb-vcvsac-asmisc" className="tab-content active">
                                    
                                    <span className="bb-label">Width</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="width" value={this.state.settings.scroll.width} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Height</span>
									<div className="bb-field-suf">
										<input type="text" step="1" className="bb-field" name="height" value={this.state.settings.scroll.height} onChange={this.onChangeScroll} />
										<span>px</span>
									</div>
        							<div className="clear"></div>
                                    
        							<span className="bb-label">Opacity</span>
                                    <div className="range-slider">
        								<input className="range-slider__range" name="opacity" type="range" defaultValue={this.state.settings.scroll.opacity} min="0" max="1" step="0.01"  onChange={this.onChangeScroll} />
										<span className="range-slider__value">
											<input type="number" min="0" max="1" step="0.01" className="bb-field" name="opacity" value={this.state.settings.scroll.opacity} onChange={this.onChangeScroll} />
										</span>
        							</div>
                                    <div className="clear"></div>
                                    
                                    <span className="bb-label">Blur</span>
                                    <input type="number" className="bb-field" name="blur" value={this.state.settings.scroll.blur} onChange={this.onChangeScroll} />
                                    <div className="clear"></div>

                                    <span className="bb-label">Z-Index</span>
        							<input type="number" step="1" className="bb-field" name="zIndex" value={this.state.settings.scroll.zIndex} onChange={this.onChangeScroll} />
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Overflow</span>
                                    <select className="bb-field" name="overflow" value={this.state.settings.scroll.overflow} onChange={this.onChangeScroll} >
        									<option value="">Default</option>
                                            <option value="auto">auto</option>
                                            <option value="hidden">hidden</option>
                                            <option value="inherit">inherit</option>
                                            <option value="initial">initial</option>
                                            <option value="overlay">overlay</option>
                                            <option value="scroll">scroll</option>
                                            <option value="unset">unset</option>
                                            <option value="visible">visible</option>
                                    </select>
        							<div className="clear"></div>
                                    
                                    <span className="bb-label">Display</span>
                                    <select className="bb-field" name="display" value={this.state.settings.scroll.display} onChange={this.onChangeScroll} >
                                        <option value="">Default</option>
                                        <option value="block">Block</option>
                                        <option value="inline-block">Inline Block</option>
                                        <option value="none">None</option>
                                        <option value="flex">Flex</option>
                                        <option value="inline-flex">Inline Flex</option>
                                        <option value="inherit">Inherit</option>
                                        <option value="initial">Initial</option>
                                    </select>
    								<div className="clear"></div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
	            </div>
				
				<div className="wpsg-import-scene">
					<div className="wpsg-import-right-bar">
						<h1>
							<i className="scrollyicon scrollyicon-perm_media"></i>
							Templates
						</h1>
						<ul className="right-bar-filter-categiry">
							
						</ul>
					</div>
					<div className="wpsg-import-body">
						<div className="wpsg-import-top-bar">
							<input type="text" className="wpsg-search-scene" placeholder="Search All Layer Objects"/>
							<i className="scrollyicon scrollyicon-clearclose"></i>
						</div>
						<div className="wpsg-all-scene">
							<ul className="wpsg-scenes">
							</ul>
						</div>
						<div className="wpsg-import-footer">
							<span>© Copyright &amp; License Info</span>
							<div className="wpsg-import-footer-pagination">
								<div className="wpsg-import-footer-pagination-container"></div>
								<div className="wpsg-import-footer-pagination-number">
									<select className="">
										<option selected="selected" value="15">Show 15 Per Page</option>
										<option value="30">Show 30 Per Page</option>
										<option value="60">Show 60 Per Page</option>
										<option value="120">Show 120 Per Page</option>
										<option value="99999">Show All</option>
									</select>
								</div>
							</div>
						</div>

					</div>
				</div>							

			</div>
        )
    }
};

class BBScenePreview extends React.Component{
	constructor(props) {
		super(props);
		this.state = { settings: this.props.settings };
	}
    componentDidUpdate() {
		window.controller.destroy(true);
		window.controller = null;
		window.scene.destroy(true);
		window.shortcode.destroy(true);
		this.bbScrollMagic();
		this.initStyle();
		dataScroll = this.state.settings;
    }
	openPreview(){
		(function($) {
			var $previewBox = $('#bb-vcvs-preview-container');
            if ($previewBox.length > 0) {
					if($previewBox.hasClass('active')) {
						$previewBox.removeClass('active');
					} else {
						$previewBox.addClass('active');
					}
            }
        }(window.jQuery));	
	}
    componentDidMount() {
		this.bbScrollMagic();
		this.initStyle();
    }

	bbScrollMagic(){

		var tweenSettings = {}, duration = 0, delay = 0, durationEase = 0, durationString = '0', reverse = true, offset = 0, triggerHook = 0.5, vertical = this.props.settings.general.vertical, triggerElement = '';
        
        if(typeof this.props.settings.scroll.width != undefined && this.props.settings.scroll.width != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {width: this.props.settings.scroll.width} );
		}
        if(typeof this.props.settings.scroll.height != undefined && this.props.settings.scroll.height != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {height: this.props.settings.scroll.height} );
		}
        if(typeof this.props.settings.scroll.blur != undefined && this.props.settings.scroll.blur != '') {
            tweenSettings = jQuery.extend( true, tweenSettings, {filter: ' blur('+this.props.settings.scroll.blur+'px)' } );
        }
        if(typeof this.props.settings.scroll.zIndex != undefined && this.props.settings.scroll.zIndex != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {zIndex: this.props.settings.scroll.zIndex} );
		}
        if(typeof this.props.settings.scroll.overflow != undefined && this.props.settings.scroll.overflow != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {overflow: this.props.settings.scroll.overflow} );
		}
        
        if(typeof this.props.settings.scroll.position != undefined && this.props.settings.scroll.position != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {position: this.props.settings.scroll.position} );
		}
        if(typeof this.props.settings.scroll.top != undefined && this.props.settings.scroll.top != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {top: this.props.settings.scroll.top} );
		}
        if(typeof this.props.settings.scroll.left != undefined && this.props.settings.scroll.left != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {left: this.props.settings.scroll.left} );
		}
        if(typeof this.props.settings.scroll.bottom != undefined && this.props.settings.scroll.bottom != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {bottom: this.props.settings.scroll.bottom} );
		}
        if(typeof this.props.settings.scroll.right != undefined && this.props.settings.scroll.right != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {right: this.props.settings.scroll.right} );
		}

		if(typeof this.props.settings.scroll.x != undefined && this.props.settings.scroll.x != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {x: this.props.settings.scroll.x} );
		}
		if(typeof this.props.settings.scroll.y != undefined && this.props.settings.scroll.y != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {y: this.props.settings.scroll.y} );
		}
		if(typeof this.props.settings.scroll.z != undefined && this.props.settings.scroll.z != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {z: this.props.settings.scroll.z} );
		}

		if(typeof this.props.settings.scroll.scaleX != undefined && this.props.settings.scroll.scaleX != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {scaleX: this.props.settings.scroll.scaleX} );
		}
		if(typeof this.props.settings.scroll.scaleY != undefined && this.props.settings.scroll.scaleY != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {scaleY: this.props.settings.scroll.scaleY} );
		}
	

		if(typeof this.props.settings.scroll.rotation != undefined && this.props.settings.scroll.rotation != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotation: this.props.settings.scroll.rotation} );
		}
		if(typeof this.props.settings.scroll.rotationX != undefined && this.props.settings.scroll.rotationX != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotationX: this.props.settings.scroll.rotationX} );
		}
		if(typeof this.props.settings.scroll.rotationY != undefined && this.props.settings.scroll.rotationY != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotationY: this.props.settings.scroll.rotationY} );
		}
		if(typeof this.props.settings.scroll.rotationZ != undefined && this.props.settings.scroll.rotationZ != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotationZ: this.props.settings.scroll.rotationZ} );
		}

		if(typeof this.props.settings.scroll.skewX != undefined && this.props.settings.scroll.skewX != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {skewX: this.props.settings.scroll.skewX} );
		}
		if(typeof this.props.settings.scroll.skewY != undefined && this.props.settings.scroll.skewY != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {skewY: this.props.settings.scroll.skewY} );
		}

		if(typeof this.props.settings.scroll.backgroundColor != undefined && this.props.settings.scroll.backgroundColor != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {backgroundColor: this.props.settings.scroll.backgroundColor} );
		}
		if(typeof this.props.settings.scroll.color != undefined && this.props.settings.scroll.color != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {color: this.props.settings.scroll.color} );
		}
		if(typeof this.props.settings.scroll.opacity != undefined && this.props.settings.scroll.opacity != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {opacity: this.props.settings.scroll.opacity} );
		}

		if(typeof this.props.settings.scroll.delay != undefined && this.props.settings.scroll.delay != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {delay: this.props.settings.scroll.delay} );
		}
		if(typeof this.props.settings.scroll.ease != undefined && this.props.settings.scroll.ease != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {ease: eval(this.props.settings.scroll.ease)} );
		}

		if(typeof this.props.settings.general.duration != undefined && this.props.settings.general.duration != '') {
			duration = this.props.settings.general.duration;
			durationString = "(duration: " + duration + ")";
		}
		if(typeof this.props.settings.general.offset != undefined && this.props.settings.general.offset != '') {
			offset = this.props.settings.general.offset;
		}
        if(typeof this.props.settings.general.triggerHook != undefined && this.props.settings.general.triggerHook != '') {
			triggerHook = this.props.settings.general.triggerHook;
		}
        if(typeof this.props.settings.general.reverse != undefined && this.props.settings.general.reverse !== '') {
			reverse = this.props.settings.general.reverse;
		}
        
        //point of execution
        if(typeof this.props.settings.general.triggerElement != undefined) {
			triggerElement = this.props.settings.general.triggerElement;
		}
        if(triggerElement == 'top-document') {
            triggerElement = '#bbsm-trigger-top-document';
        } else {
            triggerElement = "#bb-vcvs-demo-element-trigger";
        }
        

		if(typeof this.props.settings.ease.duration != undefined && this.props.settings.ease.duration != '') {
			durationEase = this.props.settings.ease.duration;
		}
        
        window.controller = new ScrollMagic.Controller({
            container: "#bb-scroll-preview-container",
        });
        window.controller_h = new ScrollMagic.Controller({
            container: "#bb-scroll-preview-container",
            vertical: false
		});

		if( duration != '' ){
			if (duration.indexOf('vh')!=-1){
				duration = duration.replace('vh', '');
				duration = $('#bb-scroll-preview-container').innerHeight()/100 * duration;
			}
		}
		var tl = gsap.timeline();
		tweenSettings['duration'] = durationEase;
		tl.to("#bb-vcvs-demo-element", tweenSettings);
		gsap.registerPlugin(MotionPathPlugin);
        window.scene = new ScrollMagic.Scene({
			triggerElement: triggerElement,
			duration: duration,
			offset: offset,
			triggerHook: triggerHook,
			tweenChanges: true,
            reverse: reverse,
		})
		.setTween(tl);
		if(typeof this.props.settings.bezier != undefined && this.props.settings.bezier.length > 0) {
			var bezierEffect = gsap.timeline();
			bezierEffect.to("#bb-vcvs-demo-element",{
				duration: 1,
				ease: eval(this.props.settings.scroll.ease),
				motionPath: {
					path:this.props.settings.bezier, 
					curviness: 2,
					autoRotate: true
				}
			});
			window.scene.setTween(bezierEffect);	
		}
		window.shortcode = new ScrollMagic.Scene({
			triggerElement: triggerElement,
			duration: duration,
			offset: offset,
			triggerHook: triggerHook,
			tweenChanges: false,
			reverse: reverse,
		})

		
		if(this.state.settings.shortcodeSelected=='sequence'&&  this.state.settings.misc.imageSequence == 'on' && this.state.settings.shortcode.sequence.images) {
			var images = this.state.settings.shortcode.sequence.images;
			var obj = {curImg: 0};
			var tween_imagesequence = gsap.timeline();
			tween_imagesequence.to(obj,{
				duration: 1,
				curImg: images.length - 1,	
				roundProps: "curImg",				
				repeat: this.state.settings.misc.imageSequenceRepeat || 0,								
				immediateRender: true,			
				onUpdate: function () {
					$("#bb-vcvs-demo-element.bb-sequence .bbsm-imagesequence img").attr("src", images[obj.curImg]);
				}
			});
			window.shortcode.setTween(tween_imagesequence);
		}
		if(this.state.settings.shortcodeSelected=='svg' && this.state.settings.shortcode.svg.svg && this.state.settings.misc.drawSVG == 'on') {
			setTimeout(()=>{ 

				var $self = $('#bb-vcvs-demo-element');
				if($self.find('path').length > 0) {
					var lineLength = $self.find('path')[0].getTotalLength();
					$self.find('path').css("stroke-dasharray", lineLength+' '+lineLength);
					$self.find('path').css("stroke-dashoffset", lineLength);
					if ( this.state.settings.misc.unableFill == 'on') {
						$self.find('path').css("fill","none");
					}
					$self.find('path').css("stroke", this.state.settings.misc.stroke);
					$self.find('path').css("stroke-width", this.state.settings.misc.strokeWidth);
					var tween_svg = gsap.timeline();
					$self.find('path').each( (index,element)=>{ 
						tween_svg.to(element, {
						duration:1,
						strokeDashoffset: 0,
					});
					} );
					window.shortcode.setTween(tween_svg);
				}
			}, 300);
			
		}
		if(this.state.settings.shortcodeSelected=='text'&&  this.state.settings.misc.textDance == 'on' && false) {
			var tl = gsap.timeline();
			var mySplitText = new SplitText($('#bb-vcvs-demo-element').find('p'), {type:"words,chars"});
			var chars = mySplitText.chars;

			gsap.set($('#bb-vcvs-demo-element').find('p'), {perspective: 400});
			var style = this.state.settings.misc.textDanceStyle;
			var stagger = this.state.settings.misc.textDanceSpeed || 0.01;
			switch (style) {
				case 'wave_from':
					tl.from(chars, {duration: 1,  opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 50% -50",  ease:"back", stagger:stagger}, "+=0");
					break;
				case 'wave_to':
					tl.to(chars, {duration: 1,  opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 50% -50",  ease:"back", stagger: stagger}, "+=0");
					break;
				default:
					tl.from(chars, {duration: 1,  opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 50% -50",  ease:"back", stagger:stagger}, "+=0");
					break;
			}
			window.shortcode.setTween(tl);
		}
		if(this.state.settings.shortcodeSelected=='video' && this.state.settings.shortcode.video.video && this.state.settings.misc.scrollToPlay == 'on') {
			var myVideo = $('#bb-vcvs-demo-element').find('video')[0];
			window.shortcode.on("start", function (event) {
				if (myVideo.paused){
					myVideo.play();
				}
				else 
					myVideo.pause();
			})
		}
		if(this.state.settings.shortcodeSelected=='video' && this.state.settings.shortcode.video.video && this.state.settings.misc.timeLapse == 'on') {
			var myVideo = $('#bb-vcvs-demo-element').find('video')[0];
			var scrollVideo = {a:0};
			setTimeout(()=>{ window.shortcode.setTween( gsap.to(scrollVideo, {a: myVideo.duration *1, onUpdate:()=>{ myVideo.currentTime = scrollVideo.a*1 } })) }, 400);
		}
		if(this.state.settings.shortcodeSelected=='audio' && this.state.settings.shortcode.audio.audio && this.state.settings.misc.scrollToPlay == 'on') {
			
			var myAudio = $('#bb-vcvs-demo-element').find('audio')[0];
			window.shortcode.on("start", function (event) {
				if (myAudio.paused){
					myAudio.play();
				}
				else 
					myAudio.pause();
			})
		}
		if(typeof this.props.settings.general.pin != undefined && this.props.settings.general.pin == 'on') {
			window.scene.setPin("#bb-vcvs-demo-element", {pushFollowers:  eval(this.props.settings.general.pushFollowers)} );
		}

		if(typeof this.props.settings.class.classToggleEnable != undefined && this.props.settings.class.classToggleEnable == 'on') {
			window.scene.removeClassToggle(true);
			jQuery("#bb-vcvs-demo-element").attr('class', 'bb-vcvs-demo-element animated');
            if(this.props.settings.class.classCSS == 'custom') {
                window.scene.setClassToggle("#bb-vcvs-demo-element", this.props.settings.class.customClassCSS);
            } else {
                window.scene.setClassToggle("#bb-vcvs-demo-element", this.props.settings.class.classCSS);
            }
		}

		window.scene.addIndicators({name: durationString});
        
        if(vertical == 'on') {
			window.scene.addTo(window.controller);
			window.shortcode.addTo(window.controller);
        } else {
			window.scene.addTo(window.controller_h);
			window.shortcode.addTo(window.controller_h);
        }
	}

	initStyle(){
		var tweenSettings = {
            width: '',
            height: '',
            position: '',
            top: '',
            left: '',
            bottom: '',
            right: '',
            zIndex: '',
			filter: '',
			transformOrigin: 'center center',
			x: 0,
			y: 0,
			z: 0,
			scaleX: 1,
			scaleY: 1,
			rotation: 0,
			rotationX: 0,
			rotationY: 0,
			rotationZ: 0,
			skewX: 0,
			skewY: 0,
			backgroundColor: '',
			color: ''
		};
        
        if(typeof this.props.settings.init.width != undefined && this.props.settings.init.width != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {width: this.props.settings.init.width} );
		}
        if(typeof this.props.settings.init.height != undefined && this.props.settings.init.height != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {height: this.props.settings.init.height} );
		}

        if(typeof this.props.settings.init.blur != undefined && this.props.settings.init.blur != '') {
            tweenSettings = jQuery.extend( true, tweenSettings, {filter:'blur('+this.props.settings.init.blur+'px)'} );
        }

        if(typeof this.props.settings.init.zIndex != undefined && this.props.settings.init.zIndex != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {zIndex: this.props.settings.init.zIndex} );
		}
        
        if(typeof this.props.settings.init.overflow != undefined && this.props.settings.init.overflow != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {overflow: this.props.settings.init.overflow} );
		}
        
        if(typeof this.props.settings.init.position != undefined && this.props.settings.init.position != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {position: this.props.settings.init.position} );
		}
        if(typeof this.props.settings.init.top != undefined && this.props.settings.init.top != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {top: this.props.settings.init.top} );
		}
        if(typeof this.props.settings.init.left != undefined && this.props.settings.init.left != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {left: this.props.settings.init.left} );
		}
        if(typeof this.props.settings.init.bottom != undefined && this.props.settings.init.bottom != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {bottom: this.props.settings.init.bottom} );
		}
        if(typeof this.props.settings.init.right != undefined && this.props.settings.init.right != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {right: this.props.settings.init.right} );
		}

		if (typeof this.props.settings.init.transformOrigin != undefined && this.props.settings.init.transformOrigin != '') {
			tweenSettings = jQuery.extend(true, tweenSettings, { transformOrigin: this.props.settings.init.transformOrigin });
		}
		if(typeof this.props.settings.init.x != undefined && this.props.settings.init.x != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {x: this.props.settings.init.x} );
		}
		if(typeof this.props.settings.init.y != undefined && this.props.settings.init.y != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {y: this.props.settings.init.y} );
		}
		if(typeof this.props.settings.init.z != undefined && this.props.settings.init.z != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {z: this.props.settings.init.z} );
		}
        
		if(typeof this.props.settings.init.scaleX != undefined && this.props.settings.init.scaleX != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {scaleX: this.props.settings.init.scaleX} );
		}
		if(typeof this.props.settings.init.scaleY != undefined && this.props.settings.init.scaleY != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {scaleY: this.props.settings.init.scaleY} );
		}
        
		if(typeof this.props.settings.init.rotation != undefined && this.props.settings.init.rotation != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotation: this.props.settings.init.rotation} );
		}
		if(typeof this.props.settings.init.rotationX != undefined && this.props.settings.init.rotationX != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotationX: this.props.settings.init.rotationX} );
		}
		if(typeof this.props.settings.init.rotationY != undefined && this.props.settings.init.rotationY != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotationY: this.props.settings.init.rotationY} );
		}
		if(typeof this.props.settings.init.rotationZ != undefined && this.props.settings.init.rotationZ != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {rotationZ: this.props.settings.init.rotationZ} );
		}
        
		if(typeof this.props.settings.init.skewX != undefined && this.props.settings.init.skewX != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {skewX: this.props.settings.init.skewX} );
		}
		if(typeof this.props.settings.init.skewY != undefined && this.props.settings.init.skewY != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {skewY: this.props.settings.init.skewY} );
		}
        
		if(typeof this.props.settings.init.backgroundColor != undefined && this.props.settings.init.backgroundColor != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {backgroundColor: this.props.settings.init.backgroundColor} );
		}
		if(typeof this.props.settings.init.color != undefined && this.props.settings.init.color != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {color: this.props.settings.init.color} );
		}
		if(typeof this.props.settings.init.opacity != undefined && this.props.settings.init.opacity != '') {
			tweenSettings = jQuery.extend( true, tweenSettings, {opacity: this.props.settings.init.opacity} );
		}
		gsap.set("#bb-vcvs-demo-element",  tweenSettings);
	}
    render() {
		dataScroll = this.props.settings;
        return (
            <div id="bb-scroll-preview" className="bb-col-preview">
                <div id="bb-vcvs-preview-container" className="bb-preview-container">
                    <h3 className="bb-title">
                        <span id="bb-vcvs-preview-expand" onClick={this.openPreview} className="dashicons active dashicons-no"></span>
                        <span>{this.props.text.livePreview}</span>
                    </h3>
                    <div id="bb-scroll-preview-container" className="inside">
						<div className="bbsm-ruler-top">
							<div className="bbsm-ruler-line">
							</div>
							<div className="wpsg-ruler-top-position-mouse"></div>
						</div>
						<div className="bbsm-ruler-left">
							<div className="bbsm-ruler-line">
							</div>
							<div className="wpsg-ruler-left-position-mouse"></div>
						</div>
                        <div id="bbsm-trigger-top-document"></div>
                        <div className="bb-vcvs-spacer"></div>
						<div id="bb-vcvs-demo-element-trigger"></div>
						
						<ElementScroll settings={this.state.settings}></ElementScroll>
						<div className="bb-vcvs-spacer s2"></div>
                    </div>
                </div>
            </div>
        );
    }
};

class BBSceneEditor extends React.Component{
    render() {
        return (<BBSceneSettings settings={this.props.settings} edit={BB_SCENE_EDIT_SETTINGS} text={BB_TRANSLATION}/>);
    }
};

ReactDOM.render(<BBSceneEditor settings={BB_SCENE_SETTINGS} edit={BB_SCENE_EDIT_SETTINGS} />, document.getElementById("BBSceneEditor"));
