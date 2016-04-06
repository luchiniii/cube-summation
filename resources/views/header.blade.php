<div class="container">
	<div class="row">
		<div class="jumbotron">
			<h1>Cube Summation</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<p class="lead">Input format</p>
			<p>
				The first line contains an integer T, the number of test-cases. T testcases follow. 
			</p>
			<p>
				For each test case, the first line will contain two integers N and M separated by a single space.
			</p>
			<p>
				N defines the N * N * N matrix. 
			</p>
			<p>
				M defines the number of operations. 
			</p>
			<p>
				The next M lines will contain either
			</p>
			<ol>
				<li>
 					UPDATE x y z W
				</li>
				<li>
 					QUERY  x1 y1 z1 x2 y2 z2 
				</li>
			</ol>
		</div>
		<div class="col-xs-6">
			<p class="lead">
				Output Format 
			</p>
			<p>
				Print the result for each QUERY.
			</p>
			<p>
				Constrains 
				1 <= T <= 50  <br>
				1 <= N <= 100  <br>
				1 <= M <= 1000  <br>
				1 <= x1 <= x2 <= N  <br>
				1 <= y1 <= y2 <= N  <br>
				1 <= z1 <= z2 <= N  <br>
				1 <= x,y,z <= N  <br>
				-109 <= W <= 109 <br>
			</p>
		</div>
	</div>
</div>
