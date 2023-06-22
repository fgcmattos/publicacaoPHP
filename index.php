<head>
	<body>
		<h1>Servidor apache ok!=)</h1>
		<h1>Testando mmudandaça via local=)</h1>
		<?php 
//ini_set('display_errors', 1);
			try
			{
				$connection = new PDO("mysql:host=191.96.31.192;dbname=teste","externo","96159237");
				$connection->exec("set names utf8");
				echo "<b>Conxão com MySQL bem sucedida!!</b><br>";
				
			}
			catch(PDOException $e)
			{
				echo "<b>Erro na conexão com o MySQL: ".$e->getMessage()." </b>";	
				exit();
			}
			
			/*INSERT, UPDATE, CREATE e DROP*/
			$sql = "INSERT INTO teste.tabela1 (nome, idade) VALUES (?, 88);";
			$nome = "João";
			$stmt = $connection->prepare($sql);
			$stmt->bindParam(1,$nome);	 //segundo parametro so pode ser passado por referencia em variavel		
			$stmt->execute();
			

			if($stmt->errorCode() != "00000")
			{
				echo "Erro código: ".$stmt->errorCode().".";
				echo implode(",",$stmt->errorInfo());
			}
			else
			{
				echo "dados inseridos com sucesso!<br>";
			}
			

			/*SELECT*/

			$rs = $connection->prepare("SELECT * FROM teste.tabela1;");
			
			if($rs->execute())
			{
				while($registro = $rs->fetch(PDO::FETCH_OBJ))
				{
					echo $registro->nome ."<br>"; 
					echo $registro->idade ."<br>";
				}; //cada registro
			}
			else
			{
				echo "Falha na busca de dados.<br>";
			}



		?>
	</body>
</head>
