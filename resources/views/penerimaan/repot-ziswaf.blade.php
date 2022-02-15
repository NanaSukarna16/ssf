<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repot Ziswaf Donatur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .center {
            text-align: center
        } 
		table {
			border-spacing:0;
			border-collapse:collapse
		}
		td,th {
			padding:0
		}
		/*! Source:https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */@media print {
			*,:after,:before {
				color:#000!important;
				text-shadow:none!important;
				background:0 0!important;
				-webkit-box-shadow:none!important;
				box-shadow:none!important
			}
			a,a:visited {
				text-decoration:underline
			}
			a[href]:after {
				content:" (" attr(href) ")"
			}
			abbr[title]:after {
				content:" (" attr(title) ")"
			}
			a[href^="javascript:"]:after,a[href^="#"]:after {
				content:""
			}
			blockquote,pre {
				border:1px solid #999;
				page-break-inside:avoid
			}
			thead {
				display:table-header-group
			}
			img,tr {
				page-break-inside:avoid
			}
			img {
				max-width:100%!important
			}
			h2,h3,p {
				orphans:3;
				widows:3
			}
			h2,h3 {
				page-break-after:avoid
			}
			.navbar {
				display:none
			}
			.btn>.caret,.dropup>.btn>.caret {
				border-top-color:#000!important
			}
			.label {
				border:1px solid #000
			}
			.table {
				border-collapse:collapse!important
			}
			.table td,.table th {
				background-color:#fff!important
			}
			.table-bordered td,.table-bordered th {
				border:1px solid #ddd!important
			}
		}
		/* @font-face {
			font-family:'Glyphicons Halflings';
			src:url(../fonts/glyphicons-halflings-regular.eot);
			src:url(../fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'),url(../fonts/glyphicons-halflings-regular.woff2) format('woff2'),url(../fonts/glyphicons-halflings-regular.woff) format('woff'),url(../fonts/glyphicons-halflings-regular.ttf) format('truetype'),url(../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg')
		} */
		
		* {
			-webkit-box-sizing:border-box;
			-moz-box-sizing:border-box;
			box-sizing:border-box
		}
		:after,:before {
			-webkit-box-sizing:border-box;
			-moz-box-sizing:border-box;
			box-sizing:border-box
		}
		html {
			font-size:30px;
			-webkit-tap-highlight-color:rgba(0,0,0,0)
		}
		body {
			font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
			font-size:150px;
			line-height:1.42857143;
			/* color:#333; */
			background-color:#fff
		}
		button,input,select,textarea {
			font-family:inherit;
			font-size:inherit;
			line-height:inherit
		}
		a {
			color:#337ab7;
			text-decoration:none
		}
		a:focus,a:hover {
			color:#23527c;
			text-decoration:underline
		}
		a:focus {
			outline:thin dotted;
			outline:5px auto -webkit-focus-ring-color;
			outline-offset:-2px
		}
		figure {
			margin:0
		}
		img {
			vertical-align:middle
		}
		.carousel-inner>.item>a>img,.carousel-inner>.item>img,.img-responsive,.thumbnail a>img,.thumbnail>img {
			display:block;
			max-width:100%;
			height:auto
		}
		.img-rounded {
			border-radius:6px
		}
		.img-thumbnail {
			display:inline-block;
			max-width:100%;
			height:auto;
			padding:4px;
			line-height:1.42857143;
			background-color:#fff;
			border:1px solid #ddd;
			border-radius:4px;
			-webkit-transition:all .2s ease-in-out;
			-o-transition:all .2s ease-in-out;
			transition:all .2s ease-in-out
		}
		.img-circle {
			border-radius:50%
		}
		hr {
			margin-top:20px;
			margin-bottom:20px;
			border:0;
			border-top:1px solid #eee
		}
		.sr-only {
			position:absolute;
			width:1px;
			height:1px;
			padding:0;
			margin:-1px;
			overflow:hidden;
			clip:rect(0,0,0,0);
			border:0
		}
		.sr-only-focusable:active,.sr-only-focusable:focus {
			position:static;
			width:auto;
			height:auto;
			margin:0;
			overflow:visible;
			clip:auto
		}
		[role=button] {
			cursor:pointer
		}
		.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6 {
			font-family:inherit;
			font-weight:500;
			line-height:1.1;
			color:inherit
		}
		.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small {
			font-weight:400;
			line-height:1;
			color:#777
		}
		.h1,.h2,.h3,h1,h2,h3 {
			margin-top:20px;
			margin-bottom:10px
		}
		.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small {
			font-size:65%
		}
		.h4,.h5,.h6,h4,h5,h6 {
			margin-top:10px;
			margin-bottom:10px
		}
		.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small {
			font-size:75%
		}
		.h1,h1 {
			font-size:36px
		}
		.h2,h2 {
			font-size:30px
		}
		.h3,h3 {
			font-size:24px
		}
		.h4,h4 {
			font-size:18px
		}
		.h5,h5 {
			font-size:14px
		}
		.h6,h6 {
			font-size:12px
		}
		p {
			margin:0 0 10px
		}
		.lead {
			margin-bottom:20px;
			font-size:16px;
			font-weight:300;
			line-height:1.4
		}
		@media (min-width:768px) {
			.lead {
				font-size:21px
			}
		}
		.small,small {
			font-size:85%
		}
		.mark,mark {
			padding:.2em;
			background-color:#fcf8e3
		}
		.text-left {
			text-align:left
		}
		.text-right {
			text-align:right
		}
		.text-center {
			text-align:center
		}
		.text-justify {
			text-align:justify
		}
		.text-nowrap {
			white-space:nowrap
		}
		.text-lowercase {
			text-transform:lowercase
		}
		.text-uppercase {
			text-transform:uppercase
		}
		.text-capitalize {
			text-transform:capitalize
		}
		.text-muted {
			color:#777
		}
		.text-primary {
			color:#337ab7
		}
		a.text-primary:focus,a.text-primary:hover {
			color:#286090
		}
		.text-success {
			color:#3c763d
		}
		a.text-success:focus,a.text-success:hover {
			color:#2b542c
		}
		.text-info {
			color:#31708f
		}
		a.text-info:focus,a.text-info:hover {
			color:#245269
		}
		.text-warning {
			color:#8a6d3b
		}
		a.text-warning:focus,a.text-warning:hover {
			color:#66512c
		}
		.text-danger {
			color:#a94442
		}
		a.text-danger:focus,a.text-danger:hover {
			color:#843534
		}
		.bg-primary {
			color:#fff;
			background-color:#337ab7
		}
		a.bg-primary:focus,a.bg-primary:hover {
			background-color:#286090
		}
		.bg-success {
			background-color:#dff0d8
		}
		a.bg-success:focus,a.bg-success:hover {
			background-color:#c1e2b3
		}
		.bg-info {
			background-color:#d9edf7
		}
		a.bg-info:focus,a.bg-info:hover {
			background-color:#afd9ee
		}
		.bg-warning {
			background-color:#fcf8e3
		}
		a.bg-warning:focus,a.bg-warning:hover {
			background-color:#f7ecb5
		}
		.bg-danger {
			background-color:#f2dede
		}
		a.bg-danger:focus,a.bg-danger:hover {
			background-color:#e4b9b9
		}
		.page-header {
			padding-bottom:9px;
			margin:40px 0 20px;
			border-bottom:1px solid #eee
		}
		ol,ul {
			margin-top:0;
			margin-bottom:10px
		}
		ol ol,ol ul,ul ol,ul ul {
			margin-bottom:0
		}
		.list-unstyled {
			padding-left:0;
			list-style:none
		}
		.list-inline {
			padding-left:0;
			margin-left:-5px;
			list-style:none
		}
		.list-inline>li {
			display:inline-block;
			padding-right:5px;
			padding-left:5px
		}
		dl {
			margin-top:0;
			margin-bottom:20px
		}
		dd,dt {
			line-height:1.42857143
		}
		dt {
			font-weight:700
		}
		dd {
			margin-left:0
		}
		@media (min-width:768px) {
			.dl-horizontal dt {
				float:left;
				width:160px;
				overflow:hidden;
				clear:left;
				text-align:right;
				text-overflow:ellipsis;
				white-space:nowrap
			}
			.dl-horizontal dd {
				margin-left:180px
			}
		}
		abbr[data-original-title],abbr[title] {
			cursor:help;
			border-bottom:1px dotted #777
		}
		.initialism {
			font-size:90%;
			text-transform:uppercase
		}
		blockquote {
			padding:10px 20px;
			margin:0 0 20px;
			font-size:17.5px;
			border-left:5px solid #eee
		}
		blockquote ol:last-child,blockquote p:last-child,blockquote ul:last-child {
			margin-bottom:0
		}
		blockquote .small,blockquote footer,blockquote small {
			display:block;
			font-size:80%;
			line-height:1.42857143;
			color:#777
		}
		blockquote .small:before,blockquote footer:before,blockquote small:before {
			content:'\2014 \00A0'
		}
		.blockquote-reverse,blockquote.pull-right {
			padding-right:15px;
			padding-left:0;
			text-align:right;
			border-right:5px solid #eee;
			border-left:0
		}
		.blockquote-reverse .small:before,.blockquote-reverse footer:before,.blockquote-reverse small:before,blockquote.pull-right .small:before,blockquote.pull-right footer:before,blockquote.pull-right small:before {
			content:''
		}
		.blockquote-reverse .small:after,.blockquote-reverse footer:after,.blockquote-reverse small:after,blockquote.pull-right .small:after,blockquote.pull-right footer:after,blockquote.pull-right small:after {
			content:'\00A0 \2014'
		}
		address {
			margin-bottom:20px;
			font-style:normal;
			line-height:1.42857143
		}
		code,kbd,pre,samp {
			font-family:Menlo,Monaco,Consolas,"Courier New",monospace
		}
		code {
			padding:2px 4px;
			font-size:90%;
			color:#c7254e;
			background-color:#f9f2f4;
			border-radius:4px
		}
		kbd {
			padding:2px 4px;
			font-size:90%;
			color:#fff;
			background-color:#333;
			border-radius:3px;
			-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.25);
			box-shadow:inset 0 -1px 0 rgba(0,0,0,.25)
		}
		kbd kbd {
			padding:0;
			font-size:100%;
			font-weight:700;
			-webkit-box-shadow:none;
			box-shadow:none
		}
		pre {
			display:block;
			padding:9.5px;
			margin:0 0 10px;
			font-size:13px;
			line-height:1.42857143;
			color:#333;
			word-break:break-all;
			word-wrap:break-word;
			background-color:#f5f5f5;
			border:1px solid #ccc;
			border-radius:4px
		}
		pre code {
			padding:0;
			font-size:inherit;
			color:inherit;
			white-space:pre-wrap;
			background-color:transparent;
			border-radius:0
		}
		.pre-scrollable {
			max-height:340px;
			overflow-y:scroll
		}
		.container {
			padding-right:15px;
			padding-left:15px;
			margin-right:auto;
			margin-left:auto
		}
		@media (min-width:768px) {
			.container {
				width:750px
			}
		}
		@media (min-width:992px) {
			.container {
				width:970px
			}
		}
		@media (min-width:1200px) {
			.container {
				width:1170px
			}
		}
		.container-fluid {
			padding-right:15px;
			padding-left:15px;
			margin-right:auto;
			margin-left:auto
		}
		.row {
			margin-right:-15px;
			margin-left:-15px
		}
		.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {
			position:relative;
			min-height:1px;
			padding-right:15px;
			padding-left:15px
		}
		.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {
			float:left
		}
		.col-xs-12 {
			width:100%
		}
		.col-xs-11 {
			width:91.66666667%
		}
		.col-xs-10 {
			width:83.33333333%
		}
		.col-xs-9 {
			width:75%
		}
		.col-xs-8 {
			width:66.66666667%
		}
		.col-xs-7 {
			width:58.33333333%
		}
		.col-xs-6 {
			width:50%
		}
		.col-xs-5 {
			width:41.66666667%
		}
		.col-xs-4 {
			width:33.33333333%
		}
		.col-xs-3 {
			width:25%
		}
		.col-xs-2 {
			width:16.66666667%
		}
		.col-xs-1 {
			width:8.33333333%
		}
		.col-xs-pull-12 {
			right:100%
		}
		.col-xs-pull-11 {
			right:91.66666667%
		}
		.col-xs-pull-10 {
			right:83.33333333%
		}
		.col-xs-pull-9 {
			right:75%
		}
		.col-xs-pull-8 {
			right:66.66666667%
		}
		.col-xs-pull-7 {
			right:58.33333333%
		}
		.col-xs-pull-6 {
			right:50%
		}
		.col-xs-pull-5 {
			right:41.66666667%
		}
		.col-xs-pull-4 {
			right:33.33333333%
		}
		.col-xs-pull-3 {
			right:25%
		}
		.col-xs-pull-2 {
			right:16.66666667%
		}
		.col-xs-pull-1 {
			right:8.33333333%
		}
		.col-xs-pull-0 {
			right:auto
		}
		.col-xs-push-12 {
			left:100%
		}
		.col-xs-push-11 {
			left:91.66666667%
		}
		.col-xs-push-10 {
			left:83.33333333%
		}
		.col-xs-push-9 {
			left:75%
		}
		.col-xs-push-8 {
			left:66.66666667%
		}
		.col-xs-push-7 {
			left:58.33333333%
		}
		.col-xs-push-6 {
			left:50%
		}
		.col-xs-push-5 {
			left:41.66666667%
		}
		.col-xs-push-4 {
			left:33.33333333%
		}
		.col-xs-push-3 {
			left:25%
		}
		.col-xs-push-2 {
			left:16.66666667%
		}
		.col-xs-push-1 {
			left:8.33333333%
		}
		.col-xs-push-0 {
			left:auto
		}
		.col-xs-offset-12 {
			margin-left:100%
		}
		.col-xs-offset-11 {
			margin-left:91.66666667%
		}
		.col-xs-offset-10 {
			margin-left:83.33333333%
		}
		.col-xs-offset-9 {
			margin-left:75%
		}
		.col-xs-offset-8 {
			margin-left:66.66666667%
		}
		.col-xs-offset-7 {
			margin-left:58.33333333%
		}
		.col-xs-offset-6 {
			margin-left:50%
		}
		.col-xs-offset-5 {
			margin-left:41.66666667%
		}
		.col-xs-offset-4 {
			margin-left:33.33333333%
		}
		.col-xs-offset-3 {
			margin-left:25%
		}
		.col-xs-offset-2 {
			margin-left:16.66666667%
		}
		.col-xs-offset-1 {
			margin-left:8.33333333%
		}
		.col-xs-offset-0 {
			margin-left:0
		}
		@media (min-width:768px) {
			.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9 {
				float:left
			}
			.col-sm-12 {
				width:100%
			}
			.col-sm-11 {
				width:91.66666667%
			}
			.col-sm-10 {
				width:83.33333333%
			}
			.col-sm-9 {
				width:75%
			}
			.col-sm-8 {
				width:66.66666667%
			}
			.col-sm-7 {
				width:58.33333333%
			}
			.col-sm-6 {
				width:50%
			}
			.col-sm-5 {
				width:41.66666667%
			}
			.col-sm-4 {
				width:33.33333333%
			}
			.col-sm-3 {
				width:25%
			}
			.col-sm-2 {
				width:16.66666667%
			}
			.col-sm-1 {
				width:8.33333333%
			}
			.col-sm-pull-12 {
				right:100%
			}
			.col-sm-pull-11 {
				right:91.66666667%
			}
			.col-sm-pull-10 {
				right:83.33333333%
			}
			.col-sm-pull-9 {
				right:75%
			}
			.col-sm-pull-8 {
				right:66.66666667%
			}
			.col-sm-pull-7 {
				right:58.33333333%
			}
			.col-sm-pull-6 {
				right:50%
			}
			.col-sm-pull-5 {
				right:41.66666667%
			}
			.col-sm-pull-4 {
				right:33.33333333%
			}
			.col-sm-pull-3 {
				right:25%
			}
			.col-sm-pull-2 {
				right:16.66666667%
			}
			.col-sm-pull-1 {
				right:8.33333333%
			}
			.col-sm-pull-0 {
				right:auto
			}
			.col-sm-push-12 {
				left:100%
			}
			.col-sm-push-11 {
				left:91.66666667%
			}
			.col-sm-push-10 {
				left:83.33333333%
			}
			.col-sm-push-9 {
				left:75%
			}
			.col-sm-push-8 {
				left:66.66666667%
			}
			.col-sm-push-7 {
				left:58.33333333%
			}
			.col-sm-push-6 {
				left:50%
			}
			.col-sm-push-5 {
				left:41.66666667%
			}
			.col-sm-push-4 {
				left:33.33333333%
			}
			.col-sm-push-3 {
				left:25%
			}
			.col-sm-push-2 {
				left:16.66666667%
			}
			.col-sm-push-1 {
				left:8.33333333%
			}
			.col-sm-push-0 {
				left:auto
			}
			.col-sm-offset-12 {
				margin-left:100%
			}
			.col-sm-offset-11 {
				margin-left:91.66666667%
			}
			.col-sm-offset-10 {
				margin-left:83.33333333%
			}
			.col-sm-offset-9 {
				margin-left:75%
			}
			.col-sm-offset-8 {
				margin-left:66.66666667%
			}
			.col-sm-offset-7 {
				margin-left:58.33333333%
			}
			.col-sm-offset-6 {
				margin-left:50%
			}
			.col-sm-offset-5 {
				margin-left:41.66666667%
			}
			.col-sm-offset-4 {
				margin-left:33.33333333%
			}
			.col-sm-offset-3 {
				margin-left:25%
			}
			.col-sm-offset-2 {
				margin-left:16.66666667%
			}
			.col-sm-offset-1 {
				margin-left:8.33333333%
			}
			.col-sm-offset-0 {
				margin-left:0
			}
		}
		@media (min-width:992px) {
			.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9 {
				float:left
			}
			.col-md-12 {
				width:100%
			}
			.col-md-11 {
				width:91.66666667%
			}
			.col-md-10 {
				width:83.33333333%
			}
			.col-md-9 {
				width:75%
			}
			.col-md-8 {
				width:66.66666667%
			}
			.col-md-7 {
				width:58.33333333%
			}
			.col-md-6 {
				width:50%
			}
			.col-md-5 {
				width:41.66666667%
			}
			.col-md-4 {
				width:33.33333333%
			}
			.col-md-3 {
				width:25%
			}
			.col-md-2 {
				width:16.66666667%
			}
			.col-md-1 {
				width:8.33333333%
			}
			.col-md-pull-12 {
				right:100%
			}
			.col-md-pull-11 {
				right:91.66666667%
			}
			.col-md-pull-10 {
				right:83.33333333%
			}
			.col-md-pull-9 {
				right:75%
			}
			.col-md-pull-8 {
				right:66.66666667%
			}
			.col-md-pull-7 {
				right:58.33333333%
			}
			.col-md-pull-6 {
				right:50%
			}
			.col-md-pull-5 {
				right:41.66666667%
			}
			.col-md-pull-4 {
				right:33.33333333%
			}
			.col-md-pull-3 {
				right:25%
			}
			.col-md-pull-2 {
				right:16.66666667%
			}
			.col-md-pull-1 {
				right:8.33333333%
			}
			.col-md-pull-0 {
				right:auto
			}
			.col-md-push-12 {
				left:100%
			}
			.col-md-push-11 {
				left:91.66666667%
			}
			.col-md-push-10 {
				left:83.33333333%
			}
			.col-md-push-9 {
				left:75%
			}
			.col-md-push-8 {
				left:66.66666667%
			}
			.col-md-push-7 {
				left:58.33333333%
			}
			.col-md-push-6 {
				left:50%
			}
			.col-md-push-5 {
				left:41.66666667%
			}
			.col-md-push-4 {
				left:33.33333333%
			}
			.col-md-push-3 {
				left:25%
			}
			.col-md-push-2 {
				left:16.66666667%
			}
			.col-md-push-1 {
				left:8.33333333%
			}
			.col-md-push-0 {
				left:auto
			}
			.col-md-offset-12 {
				margin-left:100%
			}
			.col-md-offset-11 {
				margin-left:91.66666667%
			}
			.col-md-offset-10 {
				margin-left:83.33333333%
			}
			.col-md-offset-9 {
				margin-left:75%
			}
			.col-md-offset-8 {
				margin-left:66.66666667%
			}
			.col-md-offset-7 {
				margin-left:58.33333333%
			}
			.col-md-offset-6 {
				margin-left:50%
			}
			.col-md-offset-5 {
				margin-left:41.66666667%
			}
			.col-md-offset-4 {
				margin-left:33.33333333%
			}
			.col-md-offset-3 {
				margin-left:25%
			}
			.col-md-offset-2 {
				margin-left:16.66666667%
			}
			.col-md-offset-1 {
				margin-left:8.33333333%
			}
			.col-md-offset-0 {
				margin-left:0
			}
		}
		@media (min-width:1200px) {
			.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9 {
				float:left
			}
			.col-lg-12 {
				width:100%
			}
			.col-lg-11 {
				width:91.66666667%
			}
			.col-lg-10 {
				width:83.33333333%
			}
			.col-lg-9 {
				width:75%
			}
			.col-lg-8 {
				width:66.66666667%
			}
			.col-lg-7 {
				width:58.33333333%
			}
			.col-lg-6 {
				width:50%
			}
			.col-lg-5 {
				width:41.66666667%
			}
			.col-lg-4 {
				width:33.33333333%
			}
			.col-lg-3 {
				width:25%
			}
			.col-lg-2 {
				width:16.66666667%
			}
			.col-lg-1 {
				width:8.33333333%
			}
			.col-lg-pull-12 {
				right:100%
			}
			.col-lg-pull-11 {
				right:91.66666667%
			}
			.col-lg-pull-10 {
				right:83.33333333%
			}
			.col-lg-pull-9 {
				right:75%
			}
			.col-lg-pull-8 {
				right:66.66666667%
			}
			.col-lg-pull-7 {
				right:58.33333333%
			}
			.col-lg-pull-6 {
				right:50%
			}
			.col-lg-pull-5 {
				right:41.66666667%
			}
			.col-lg-pull-4 {
				right:33.33333333%
			}
			.col-lg-pull-3 {
				right:25%
			}
			.col-lg-pull-2 {
				right:16.66666667%
			}
			.col-lg-pull-1 {
				right:8.33333333%
			}
			.col-lg-pull-0 {
				right:auto
			}
			.col-lg-push-12 {
				left:100%
			}
			.col-lg-push-11 {
				left:91.66666667%
			}
			.col-lg-push-10 {
				left:83.33333333%
			}
			.col-lg-push-9 {
				left:75%
			}
			.col-lg-push-8 {
				left:66.66666667%
			}
			.col-lg-push-7 {
				left:58.33333333%
			}
			.col-lg-push-6 {
				left:50%
			}
			.col-lg-push-5 {
				left:41.66666667%
			}
			.col-lg-push-4 {
				left:33.33333333%
			}
			.col-lg-push-3 {
				left:25%
			}
			.col-lg-push-2 {
				left:16.66666667%
			}
			.col-lg-push-1 {
				left:8.33333333%
			}
			.col-lg-push-0 {
				left:auto
			}
			.col-lg-offset-12 {
				margin-left:100%
			}
			.col-lg-offset-11 {
				margin-left:91.66666667%
			}
			.col-lg-offset-10 {
				margin-left:83.33333333%
			}
			.col-lg-offset-9 {
				margin-left:75%
			}
			.col-lg-offset-8 {
				margin-left:66.66666667%
			}
			.col-lg-offset-7 {
				margin-left:58.33333333%
			}
			.col-lg-offset-6 {
				margin-left:50%
			}
			.col-lg-offset-5 {
				margin-left:41.66666667%
			}
			.col-lg-offset-4 {
				margin-left:33.33333333%
			}
			.col-lg-offset-3 {
				margin-left:25%
			}
			.col-lg-offset-2 {
				margin-left:16.66666667%
			}
			.col-lg-offset-1 {
				margin-left:8.33333333%
			}
			.col-lg-offset-0 {
				margin-left:0
			}
		}
		table {
			background-color:transparent
		}
		caption {
			padding-top:8px;
			padding-bottom:8px;
			color:#777;
			text-align:left
		}
		th {
			text-align:left
		}
		.table {
			width:100%;
			max-width:100%;
			margin-bottom:20px
		}
		.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th {
			padding:8px;
			line-height:1.42857143;
			vertical-align:top;
			border-top:1px solid #ddd
		}
		.table>thead>tr>th {
			vertical-align:bottom;
			border-bottom:2px solid #ddd
		}
		.table>caption+thead>tr:first-child>td,.table>caption+thead>tr:first-child>th,.table>colgroup+thead>tr:first-child>td,.table>colgroup+thead>tr:first-child>th,.table>thead:first-child>tr:first-child>td,.table>thead:first-child>tr:first-child>th {
			border-top:0
		}
		.table>tbody+tbody {
			border-top:2px solid #ddd
		}
		.table .table {
			background-color:#fff
		}
		.table-condensed>tbody>tr>td,.table-condensed>tbody>tr>th,.table-condensed>tfoot>tr>td,.table-condensed>tfoot>tr>th,.table-condensed>thead>tr>td,.table-condensed>thead>tr>th {
			padding:5px
		}
		.table-bordered {
			border:1px solid #ddd
		}
		.table-bordered>tbody>tr>td,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>td,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>thead>tr>th {
			border:1px solid #ddd
		}
		.table-bordered>thead>tr>td,.table-bordered>thead>tr>th {
			border-bottom-width:2px
		}
		.table-striped>tbody>tr:nth-of-type(odd) {
			background-color:#f9f9f9
		}
		.table-hover>tbody>tr:hover {
			background-color:#f5f5f5
		}
		table col[class*=col-] {
			position:static;
			display:table-column;
			float:none
		}
		table td[class*=col-],table th[class*=col-] {
			position:static;
			display:table-cell;
			float:none
		}
		.table>tbody>tr.active>td,.table>tbody>tr.active>th,.table>tbody>tr>td.active,.table>tbody>tr>th.active,.table>tfoot>tr.active>td,.table>tfoot>tr.active>th,.table>tfoot>tr>td.active,.table>tfoot>tr>th.active,.table>thead>tr.active>td,.table>thead>tr.active>th,.table>thead>tr>td.active,.table>thead>tr>th.active {
			background-color:#f5f5f5
		}
		.table-hover>tbody>tr.active:hover>td,.table-hover>tbody>tr.active:hover>th,.table-hover>tbody>tr:hover>.active,.table-hover>tbody>tr>td.active:hover,.table-hover>tbody>tr>th.active:hover {
			background-color:#e8e8e8
		}
		.table>tbody>tr.success>td,.table>tbody>tr.success>th,.table>tbody>tr>td.success,.table>tbody>tr>th.success,.table>tfoot>tr.success>td,.table>tfoot>tr.success>th,.table>tfoot>tr>td.success,.table>tfoot>tr>th.success,.table>thead>tr.success>td,.table>thead>tr.success>th,.table>thead>tr>td.success,.table>thead>tr>th.success {
			background-color:#dff0d8
		}
		.table-hover>tbody>tr.success:hover>td,.table-hover>tbody>tr.success:hover>th,.table-hover>tbody>tr:hover>.success,.table-hover>tbody>tr>td.success:hover,.table-hover>tbody>tr>th.success:hover {
			background-color:#d0e9c6
		}
		.table>tbody>tr.info>td,.table>tbody>tr.info>th,.table>tbody>tr>td.info,.table>tbody>tr>th.info,.table>tfoot>tr.info>td,.table>tfoot>tr.info>th,.table>tfoot>tr>td.info,.table>tfoot>tr>th.info,.table>thead>tr.info>td,.table>thead>tr.info>th,.table>thead>tr>td.info,.table>thead>tr>th.info {
			background-color:#d9edf7
		}
		.table-hover>tbody>tr.info:hover>td,.table-hover>tbody>tr.info:hover>th,.table-hover>tbody>tr:hover>.info,.table-hover>tbody>tr>td.info:hover,.table-hover>tbody>tr>th.info:hover {
			background-color:#c4e3f3
		}
		.table>tbody>tr.warning>td,.table>tbody>tr.warning>th,.table>tbody>tr>td.warning,.table>tbody>tr>th.warning,.table>tfoot>tr.warning>td,.table>tfoot>tr.warning>th,.table>tfoot>tr>td.warning,.table>tfoot>tr>th.warning,.table>thead>tr.warning>td,.table>thead>tr.warning>th,.table>thead>tr>td.warning,.table>thead>tr>th.warning {
			background-color:#fcf8e3
		}
		.table-hover>tbody>tr.warning:hover>td,.table-hover>tbody>tr.warning:hover>th,.table-hover>tbody>tr:hover>.warning,.table-hover>tbody>tr>td.warning:hover,.table-hover>tbody>tr>th.warning:hover {
			background-color:#faf2cc
		}
		.table>tbody>tr.danger>td,.table>tbody>tr.danger>th,.table>tbody>tr>td.danger,.table>tbody>tr>th.danger,.table>tfoot>tr.danger>td,.table>tfoot>tr.danger>th,.table>tfoot>tr>td.danger,.table>tfoot>tr>th.danger,.table>thead>tr.danger>td,.table>thead>tr.danger>th,.table>thead>tr>td.danger,.table>thead>tr>th.danger {
			background-color:#f2dede
		}
		.table-hover>tbody>tr.danger:hover>td,.table-hover>tbody>tr.danger:hover>th,.table-hover>tbody>tr:hover>.danger,.table-hover>tbody>tr>td.danger:hover,.table-hover>tbody>tr>th.danger:hover {
			background-color:#ebcccc
		}
		.table-responsive {
			min-height:.01%;
			overflow-x:auto
		}
		@media screen and (max-width:767px) {
			.table-responsive {
				width:100%;
				margin-bottom:15px;
				overflow-y:hidden;
				-ms-overflow-style:-ms-autohiding-scrollbar;
				border:1px solid #ddd
			}
			.table-responsive>.table {
				margin-bottom:0
			}
			.table-responsive>.table>tbody>tr>td,.table-responsive>.table>tbody>tr>th,.table-responsive>.table>tfoot>tr>td,.table-responsive>.table>tfoot>tr>th,.table-responsive>.table>thead>tr>td,.table-responsive>.table>thead>tr>th {
				white-space:nowrap
			}
			.table-responsive>.table-bordered {
				border:0
			}
			.table-responsive>.table-bordered>tbody>tr>td:first-child,.table-responsive>.table-bordered>tbody>tr>th:first-child,.table-responsive>.table-bordered>tfoot>tr>td:first-child,.table-responsive>.table-bordered>tfoot>tr>th:first-child,.table-responsive>.table-bordered>thead>tr>td:first-child,.table-responsive>.table-bordered>thead>tr>th:first-child {
				border-left:0
			}
			.table-responsive>.table-bordered>tbody>tr>td:last-child,.table-responsive>.table-bordered>tbody>tr>th:last-child,.table-responsive>.table-bordered>tfoot>tr>td:last-child,.table-responsive>.table-bordered>tfoot>tr>th:last-child,.table-responsive>.table-bordered>thead>tr>td:last-child,.table-responsive>.table-bordered>thead>tr>th:last-child {
				border-right:0
			}
			.table-responsive>.table-bordered>tbody>tr:last-child>td,.table-responsive>.table-bordered>tbody>tr:last-child>th,.table-responsive>.table-bordered>tfoot>tr:last-child>td,.table-responsive>.table-bordered>tfoot>tr:last-child>th {
				border-bottom:0
			}
		}
    </style>

</head>
<body style="font-size: 15px; font-family: Calbiri;" class="mr-4 ml-4">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline10-list mt-b-30">
                <div class="sparkline10-hd" style="margin-left: 5px; margin-right: 5px;">
                    <div class="main-sparkline10-hd">
						<div class="float-left">
							<button  style="width: 170px; height: 60px; background-color: black;"></button>
							<p style="margin-top: -8px; font-size: 15px;"><b>LAPORAN ZISWAF </b>  (Zakat/Infak Sedekah/Wakaf)</p>
							<p style="margin-top: -8px; font-size: 15px;">
								<i>ZISWAF Report</i> <br> {{$penerimaan->donatur->nama}} <br>
								{{$penerimaan->donatur->provinsi}}  <br>
								{{$penerimaan->donatur->hp}} 
							</p>
						</div>
						<div class="float-right">
							<img src="https://i.imgur.com/8LvZpTFt.png"style="margin-top: -33px;" class="img" width="210px">
						</div> 
						{{-- <p> Wakaf tersebut diberikan melalui Nazir Wakaf Yayasan Bina Tsaqofah dengan Wakif </p> --}}
						<table style="margin-top: 200px;">
                            <tr>
                                <td style="width: 100px">ID Donatur</td>
                                <td style="width: 30px; height: 25px;">:</td>
								<td> {{$penerimaan->donatur->kode }}</td>
                            </tr>
                            {{-- <tr>
                                <td>Periode</td>
                                <td style="width: 30px; height: 25px;">:</td>
                               <td>Januari 2022</td>
                            </tr> --}}
                            <tr>
                                <td>Laporan</td>
                            </tr>
                        </table>

						<div class="float-right mt-2">
							<button  style="width: 190px; height: 50px; background-color: black;">
							</button>
						</div> <br> <br> <br>
						<b>--------------------------------------------------------------------------------------------------------------------------------</b>
						<div class="table-responsive mt-3" style="margin-top: 60px">
							<table class="table table-hover">
								<thead  style="background-color: rgb(224, 224, 224);">
									<tr >
										<th>Tanggal <br> Date</th>
										<th>Jenis Transaksi <br> Transaction </th>
										<th>No. Ref <br> Ref. Num </th>
										<th>Jumlah (Rp) <br> Amount</th>
									</tr>
								</thead>
								<tbody>
									 @forelse ($penerimaanf as $item)
									<tr>
										<td>{{ $item->tgl_tf }}</td>
										<td>{{ $item->program }}</td>
										<td>{{ $item->reff }}</td>
										<td>Rp. {{number_format($item->nominal ?? 0, 2)}} </td>
									</tr>  
									 @endforeach
								</tbody>
								<tfoot>
									<tr>
										<td><b>Total</b> </td>
										<td></td>
										<td></td>
										<td><b>Rp. {{number_format ($data->jumlah ?? 0, 2)}} </b> </td>
									</tr>
								</tfoot>
								
							</table>
						</div>
						<div class="text-center"> 
							<p class="text-justify">Jazakumullah Khair Katsiraa atas ZISWAFnya Teriring doa, semoga Allah memberikan pahala atas apa yang engkau berikan dan semoga Allah memberikan berkah atas harta yang kau simpan serta menjadikannya pembersih (dosa) bagimu. </p>
							<img src="https://i.imgur.com/u0iHBj7.png" style="position:absolute; bottom: 10px; left: -80px;">
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>