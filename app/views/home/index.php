<nav class="navbar navbar-expand-sm fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand"
      ><img
        src="<?= BASEURL; ?>/images/book_logo.png"
        alt="logo-icon"
        width="55px"
        id="logo"
      />Book Review</a
    >

    <div class="collapse navbar-collapse" id="mynavbar">
      <ul
        class="navbar-nav ms-auto d-flex align-items-center justify-content-center"
      >
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center justify-content-center"
            href="javascript:void(0)"
            ><span class="material-symbols-outlined" id="icon">
              shopping_cart
            </span></a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center justify-content-center"
            href="javascript:void(0)"
            ><span class="material-symbols-outlined" id="icon">
              favorite
            </span></a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center justify-content-center"
            href="javascript:void(0)"
            ><button
              type="button"
              class="btn btn-primary d-flex align-items-center justify-content-center"
            >
              <span class="material-symbols-outlined" id="profile">
                account_circle </span
              >Logout
            </button></a
          >
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="d-flex content">
  <div class="list-genre">
  <div class="listgenre-body">
    <h2 id="judulgenre">Genre</h2>
    <a href="<?= BASEURL; ?>/Home/index/1" class="genre"><p>Self Improvement</p></a>
    <a href="<?= BASEURL; ?>/Home/index/2" class="genre"><p>Horror</p></a>
    <a href="<?= BASEURL; ?>/Home/index/3" class="genre"><p>Romance</p></a>
  </div>
</div>

<div class="container book-content">
  <div class="row g-5 container-book">
    <?php foreach ($data['books'] as $book): ?>
    <div class="col-md-6 mb-3">
      <div class="card d-flex flex-row justfy-content-between kotak-buku">
        <div class="wrapper-book-content d-flex">
          <img
            src="<?= BASEURL . '/images' . $book['img_path'] . '.jpg'; ?>"
            class="card-img-top flex-shrink-0 p-2"
            alt="<?= $book['title']; ?>"
            style="width: 30%; object-fit: cover; border-radius: 13px"
          />
          <div class="card-body d-flex flex-column p-3">
            <h3 class="card-title" id="book-title"><?= $book['title']; ?></h3>
            <p class="card-text">
              <strong><?= $book['author']; ?></strong>
            </p>
            <div class="mt-auto">
              <p class="card-text">
                Rating:
                <?= $book['rating']; ?>/10
              </p>
              <form action="<?= BASEURL; ?>/BookDetail" method="POST">
                <input type="hidden" name="book_id" value="<?= $book['book_id'];?>">
                <button type="submit" class="btn btn-brown btn-sm fw-bold">Check</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>


</div>
