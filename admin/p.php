	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>/* Google Embed API */(function(w,d,s,g,js,fjs){ g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}}; js=d.createElement(s);fjs=d.getElementsByTagName(s)[0]; js.src='https://apis.google.com/js/platform.js';fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};}(window,document,'script'));</script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  
	<!-- YOUR API ID, CREATE YOURS IN GOOGLE APIs CONSOLE -->
	<script>var GOOGLE_API_CLIENT_ID = '697273618620-l3njbtiro04j3k7qtf9rlnuapmrrttab.apps.googleusercontent.com'; </script>
	
	<script src="bootboard.dev.js"></script>
	
<!-- DASHBOARD HEADER -->
    <main class="container theme-showcase" role="main"><br/><br/>
  <div class="row">
	<div class="col-xs-12 panel panel-defailt">
		<div class="panel-body" id="view-selector">
		<p class="navbar-text navbar-right"><span id="auth-button"></span></p>
		</div>
	</div>
  </div>

<!-- /DASHBOARD HEADER -->

<!-- DASHBOARD CHARTS --> 
	<div id="dashboard" class="row" data-segment="ga:medium==organic">
	<!-- ALL DASHBOARD CHARTS ARE SEGMENTED BY MEDIUM = ORGANIC -->
	
	<div class="row">
		<div class=" col-xs-12 col-md-9">
			<div class="row">
				<div class=" col-xs-6 col-md-4">
				<div class="panel panel-default"><div class="panel-body">
				<div class="ga-chart xsmall-height "
					title="Sesiones"
					data-type="metric" 
					data-dimensions=""
					data-metrics="ga:sessions"
					data-start-date="30daysAgo"
					data-end-date="yesterday"
					data-filter=""
					data-segment=""
					data-colors="#0099C6"
					data-template="{data} <span class='glyphicon glyphicon-user'></span>"
				></div>
				</div></div>
				</div>
				
				<div class=" col-xs-6 col-md-4">
				<div class="panel panel-default"><div class="panel-body">
				<div class="ga-chart xsmall-height " 
				title="Rebote"
				data-type="metric" 
				data-dimensions=""
				data-metrics="ga:bounceRate"
				data-start-date="30daysAgo"
				data-end-date="yesterday"
				data-filter=""
				data-segment=""
				data-colors="#666"
				data-template="{data}% <span class='glyphicon glyphicon-share-alt'></span>"
				></div>
				</div></div>
				</div>
				
				<div class=" col-xs-6 col-md-4">
				<div class="panel panel-default"><div class="panel-body">
				<div class="ga-chart xsmall-height "
				title="Transacciones"
				data-type="metric" 
				data-dimensions=""
				data-metrics="ga:transactions"
				data-start-date="30daysAgo"
				data-end-date="yesterday"
				data-filter=""
				data-segment=""
				data-colors="#DC3912"
				data-template="{data} <span class='glyphicon glyphicon-shopping-cart'></span>"
				></div>
				</div></div>
				</div>
			</div>
			
			<div class="row">
				<div class=" col-xs-6 col-md-4">
				<div class="panel panel-default"><div class="panel-body">
				<div class="ga-chart xsmall-height "
					title="Páginas distintas reciben visitas"
					data-type="metric" 
					data-dimensions="ga:landingPagepath"
					data-metrics="countrows"
					data-start-date="30daysAgo"
					data-end-date="yesterday"
					data-filter=""
					data-segment=""
					data-colors="#ppp"
					data-template="{data} <span class='glyphicon glyphicon-duplicate'></span>"
				></div>
				</div></div>
				</div>
				
				<div class=" col-xs-6 col-md-4">
				<div class="panel panel-default"><div class="panel-body">
				<div class="ga-chart xsmall-height " 
				title="Keywords distintas"
				data-type="metric" 
				data-dimensions="ga:keyword"
				data-metrics="countrows"
				data-start-date="30daysAgo"
				data-end-date="yesterday"
				data-filter=""
				data-segment=""
				data-colors="#666"
				data-template="<small>de</small> {data} <span class='glyphicon glyphicon-tags'></span>"
				></div>
				</div></div>
				</div>
				
				<div class=" col-xs-6 col-md-4">
				<div class="panel panel-default"><div class="panel-body">
				<div class="ga-chart xsmall-height "
				title="Ingresos por visita"
				data-type="metric" 
				data-dimensions=""
				data-metrics="ga:transactionRevenuePerSession"
				data-start-date="30daysAgo"
				data-end-date="yesterday"
				data-filter=""
				data-segment=""
				data-colors="#DC3912"
				data-template="{data} <span class='glyphicon glyphicon-piggy-bank'></span>"
				></div>
				</div></div>
				</div>
			</div>
			
			
			<div class="row"><div class=" col-xs-12">
				<div class="panel panel-default"><div class="panel-body">
				<div class="row">
					<div class="col-xs-6 col-md-3">
						<select class="ga-chart-control form-control" 
							data-queryvar="metrics" 
							data-targetids="trend" >
						<option value="ga:sesions" >Sesiones</option>
						<option value="ga:transactions" >Transacciones</option>
						<option value="ga:goalCompletionsAll" >Objetivos cumplidos (todos juntos)</option>
						<option value="ga:goal1Completions" >Objetivos 1 cumplidos</option>
						<option value="ga:goal2Completions" >Objetivos 2 cumplidos</option>
						<option value="ga:goal3Completions" >Objetivos 3 cumplidos</option>
						<option value="ga:goal4Completions" >Objetivos 4 cumplidos</option>
						<option value="ga:goal5Completions" >Objetivos 5 cumplidos</option>
						<option value="ga:goal6Completions" >Objetivos 6 cumplidos</option>
						<option value="ga:sesions" >... etc.</option>
						</select>
					</div>
					<div class="col-xs-6 col-md-3">
						<select class="ga-chart-control form-control" 
							data-queryvar="start-date" 
							data-targetids="trend" >
						<option value="30daysAgo" >Desde hace 30 días</option>
						<option value="90daysAgo" >Desde hace 90 días</option>
						<option value="(+0)-(+0)-01" >Desde inicio de este mes</option>
						<option value="(+0)-(-1)-01" >Desde inicio del mes pasado</option>
						<option value="(+0)-01-01" >Desde inicio del año</option>
						</select>
					</div>
				
					<div class="col-xs-6 col-md-3">
						<select class="ga-chart-control form-control" 
							data-queryvar="dimensions" 
							data-targetids="trend" >
						<option value="ga:date" >Por días</option>
						<option value="ga:yearWeek" >Por semanas</option>
						<option value="ga:yearMonth" >Por meses</option>
						</select>
					</div>
						<hr/><hr/>
					
				</div>
				<div class="ga-chart " id="trend"
				title="Tendencia SEO"
				data-type="area" 
				data-dimensions="ga:date"
				data-metrics="ga:sessions"
				data-start-date="30daysAgo"
				data-end-date="yesterday"
				data-filter=""
				data-segment=""
				></div>	
			
				</div></div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="panel panel-default">
				<div class="panel-heading">Tipo de Keywords (sólo conocidas)</div>
				<div class="panel-body">
					<div class="ga-chart"
						title=""
						data-type="bar" 
						data-dimensions=""
						
						data-name1="1 Word"
						data-metric1="ga:sessions"
						data-segment1="ga:keyword=~^[^ ]+$;ga:keyword!~(not provided|not set)"
						
						data-name2="2 Words"
						data-metric2="ga:sessions"
						data-segment2="ga:keyword=~^[^ ]+ [^ ]+$;ga:keyword!~(not provided|not set)"
						
						data-name3="3-5 Words"
						data-metric3="ga:sessions"
						data-segment3="ga:keyword=~^[^ ]+ [^ ]+ [^ ]+( [^ ]+)?( [^ ]+)?$;ga:keyword!~(not provided|not set)"
						
						data-name4="+5 Words"
						data-metric4="ga:sessions"
						data-segment4="ga:keyword=~^[^ ]+ [^ ]+ [^ ]+ [^ ]+ [^ ]+ [^ ]+;ga:keyword!~(not provided|not set)"
						
						data-start-date="30daysAgo"
						data-end-date="yesterday"
						data-filter=""
						data-segment=""

						></div>	
				</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="panel panel-default">
				<div class="panel-heading">Tipo de usuario captado</div>
				<div class="panel-body">
					<div class="ga-chart"
						title=""
						data-type="pie" 
						data-dimensions="ga:userType"
						data-metrics="ga:sessions"
					
						data-start-date="30daysAgo"
						data-end-date="yesterday"
						data-filter=""
						data-segment=""

						></div>	
				</div>
				</div>
			</div>
		</div>
		

		<div class="row"><div class=" col-xs-12">
				<div class="panel panel-default"><div class="panel-body">
				<div class="col-xs-6 col-md-3">
						<select class="ga-chart-control form-control" 
							data-queryvar="dimensions" 
							data-targetids="table" >
						<option value="ga:landingPagepath" >Landings</option>
						<option value="ga:keyword" >Keywords</option>
						<option value="ga:country" >Países</option>
						<option value="ga:deviceCategory" >Dispositivos</option>
						<option value="ga:source">Buscadores</option>
						</select>
					</div>
					<div class="col-xs-6 col-md-3">
						<select class="ga-chart-control form-control" 
							data-queryvar="start-date" 
							data-targetids="table" >
						<option value="30daysAgo" >Desde hace 30 días</option>
						<option value="90daysAgo" >Desde hace 90 días</option>
						<option value="(+0)-(+0)-01" >Desde inicio de este mes</option>
						<option value="(+0)-(-1)-01" >Desde inicio del mes pasado</option>
						<option value="(+0)-01-01" >Desde inicio del año</option>
						</select>
					</div>
			
						<hr/><hr/>
					
				</div>
				
				
				<div class="ga-chart big-height" id="table"
				title=""
				data-type="table" 
				data-dimensions="ga:landingPagePath"
				data-metrics="ga:sessions,ga:bounces,ga:transactions"
				data-start-date="30daysAgo"
				data-end-date="yesterday"
				data-filter=""
				data-segment=""
				></div>	
				
				
				</div></div>
		</div></div>
		
	</div><!-- .row -->
	<div class="row">
		<div class="col-xs-12">	
		</div>
	</div><!-- .row -->
	</div>
	</div><!-- End Dashboard -->

	</main>
<!-- /DASHBOARD CHARTS -->	
 
