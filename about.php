<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html data-theme="lofi" class="scrolly">

<head>
	<title>NextLevel | Student Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="includes/skin.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<!--Fluid Navigation-->

	<?php include_once('includes/header.php'); ?>

	<!-- End Of Fluid Navigation -->

	<!-- the Main Content Area -->

	<div class="relative overflow-hidden bg-black text-white">
		<div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
			<div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
				<div class="sm:max-w-lg">
					<h1 class="text-4xl font-bold tracking-tight sm:text-6xl">Doing Crazy Stuff Everytime..</h1>
					<p class="mt-4 text-xl py-6">this is the team NextLevel, we do some out of the box designs and developements that rething programming and projects to NextLevel..</p>
				</div>
				<div>
					<div class="mt-10">

						<!-- images Showcase Grid -->

						<div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
							<div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
								<div class="flex items-center space-x-6 lg:space-x-8">
									<div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
										<div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
											<img src="https://user-images.githubusercontent.com/3369400/133268513-5bfe2f93-4402-42c9-a403-81c9e86934b6.jpeg" alt="" class="h-full w-full object-cover object-center">
										</div>
										<div class="h-64 w-44 overflow-hidden rounded-lg">
											<img src="https://github.githubassets.com/assets/hero-mobile-7163f4f5de41.webp" alt="" class="h-full w-full object-cover object-center">
										</div>
									</div>
									<div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
										<div class="h-64 w-44 overflow-hidden rounded-lg">
											<img src="https://github.blog/wp-content/uploads/2023/08/1200x630-Blog-Master.png?fit=1200%2C630" alt="" class="h-full w-full object-cover object-center">
										</div>
										<div class="h-64 w-44 overflow-hidden rounded-lg">
											<img src="https://www.medicalbuyer.co.in/wp-content/uploads/2022/06/MedTech_870x470.jpg" alt="" class="h-full w-full object-cover object-center">
										</div>
										<div class="h-64 w-44 overflow-hidden rounded-lg">
											<img src="https://studio.pinotspalette.com/briercreek/images/ai-art-1024x683.jpg" alt="" class="h-full w-full object-cover object-center">
										</div>
									</div>
									<div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
										<div class="h-64 w-44 overflow-hidden rounded-lg">
											<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRTcVUmanIze8qwnCXHYPO2n-hMQnBEV9ewg&usqp=CAU" alt="" class="h-full w-full object-cover object-center">
										</div>
										<div class="h-64 w-44 overflow-hidden rounded-lg">
											<img src="https://thewildcattribune.com/wp-content/uploads/2022/10/52388578661_1c7aefa9f8_c.jpg" alt="" class="h-full w-full object-cover object-center">
										</div>
									</div>
								</div>
							</div>
						</div>

						<a href="#" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">Browse Projects</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- End Of Main Content Area -->

</body>

</html>