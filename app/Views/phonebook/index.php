<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ci4 PhoneBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Add Contact</a>
        </li>
      </ul>      
    </div>
  </div>
</nav>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mt-5">
      <?php
        if(!empty($session->getFlashdata('success'))){
          echo '<div class="alert alert-success mt-5" role="alert">'.$session->getFlashdata('success').'</div>';
        }

        // for error in update id  
        if(!empty($session->getFlashdata('error'))){
          echo '<div class="alert alert-danger mt-5" role="alert">'.$session->getFlashdata('error').'</div>';
        }
      ?>
      
    </div>
    <div class="col-md-3 mt-5">
      <a href="#" class="btn btn-success btn-pos">Add New Contact</a>
    </div>
  </div>

  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(!empty($contacts)){
            foreach($contacts as $contact){              
        ?>
        <tr>
          <th scope="row"><?=$contact['id'];?></th>
          <td><?=$contact['name'];?></td>
          <td><?=$contact['mobile'];?></td>
          <td><a href="<?=base_url('update/'.$contact['id']); ?>" class="btn btn-primary m-1">Update</a>
          <button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <?php }} else {?>
          <tr>
            <td colspan="4">No records found........</td>
          </tr>
          <?php }?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>