<!DOCTYPE html>
<html>
<head>
	@include('page.section.head')

	<style>
		body {
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			color: #B0BEC5;
			font-weight: 100;
		}

		.container {
			margin: 0 auto;
			text-align: center;
			vertical-align: middle;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 72px;
			margin-bottom: 40px;
		}

		.description {
			font-size: 24px;
		}
	</style>
</head>
<body class="error-page">
	<main>
		<div class="container">
			@yield('message')
		</div>
	</main>
</body>
</html>