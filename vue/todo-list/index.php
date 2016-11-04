<?php include("includes/header.php"); ?>


<!-- Sidebar -->
<div id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a href="#">
        Start Bootstrap
      </a>
    </li>
    <li>
      <form action="modele/todo-list/post.php" method="post">
	<input type="text" name="createList" class="creer" placeholder="Nouvelle Liste" />
	<input type="submit" value="créer"/>
      </form>
    </li>
    <?php

    while ($rowFromList = $lists->fetch())
    {
	if ($rowFromList['id'] == $id)
	{
	    $nomList = $rowFromList['nom'];
	}
    ?>
    

    <li>
      <a href="index.php?liste=<?php echo $rowFromList["id"];?>"><?php echo $rowFromList['nom']; ?></a>
    </li>

    <?php
    }
    ?>

    <li>
      <form action="modele/todo-list/post.php" method="post">
	<input type="text" name="deleteList" class="creer" placeholder="supprimer Liste" />
	<input type="submit" value="suppr"/>
      </form>
    </li>
  </ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1><?php echo  $nomList; ?></h1>
        <ul class="list-group">
	  <?php
	  while ($rowFromTask = $tasks->fetch())
	  {
	  ?>

	    <li class="list-group-item">
	      <?php echo $rowFromTask['contenu']."   ";?>
	      <form action="modele/todo-list/post.php" method="post">
		<input type="hidden" name="deleteTask" value="<?php echo $rowFromTask['id']; ?>"/>
		<input type="submit" value="suppr"/>
	      </form>
	      <form action="modele/todo-list/post.php" method="post">
		<input type="hidden" name="statusTask" value="<?php echo $rowFromTask['status']; ?>"/>
		<input type="hidden" name="idTask" value="<?php echo $rowFromTask['id']; ?>"/>
		<input type="submit" value="<?php if ($rowFromTask['status'] == "fait")
					    {
						echo "undone";
					    }
					    else
					    {
						echo "done";
					    }
					    ?>"/>
	      </form>

	    </li>
	  <?php
	  }
	  ?>
	</ul>
	<form action="modele/todo-list/post.php" method="post">
	  <input type="text" name="createTask" class="creer" placeholder="Nouvelle tache" />
	  <input type="hidden" name="id_list" value="<?php echo $id; ?>"/>
	  <input type="submit" value="créer"/>
	</form>

	<br/>

        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
      </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
