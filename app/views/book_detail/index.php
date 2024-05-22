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
              favorite
            </span></a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center justify-content-center"
            href="<?= BASEURL; ?>/AuthController/logout"
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
  <div class="list-genre mt-3">
    <div class="listgenre-body">
      <h2 id="judulgenre">Genre</h2>
      <a href="<?= BASEURL; ?>/Home/index/1" class="genre"
        ><p>Self Improvement</p></a
      >
      <a href="<?= BASEURL; ?>/Home/index/2" class="genre"><p>Horror</p></a>
      <a href="<?= BASEURL; ?>/Home/index/3" class="genre"><p>Romance</p></a>
    </div>
  </div>

  <div class="container book-content">

    <div class="image-container d-flex justify-content-center">
      <img
        src="<?= BASEURL . '/images' . $data['detail_book']['img_path'] . '.jpg'; ?>"
        class="card-img-top"
        id="cover"
      />
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" id="judul">
            <?= $data['detail_book']['title'] ?>
          </h1>

          <ul class="nav">
            <li class="nav-item">
              <p class="nav-link" id="listsatu">Author</p>
            </li>
            <li class="nav-item">
              <p class="nav-link" id="listdua">:</p>
            </li>
            <li class="nav-item">
              <p class="nav-link"><?= $data['detail_book']['author']; ?></p>
            </li>
          </ul>

          <ul class="nav">
            <li class="nav-item">
              <p class="nav-link" id="listsatu">Page</p>
            </li>
            <li class="nav-item">
              <p class="nav-link" id="listdua">:</p>
            </li>
            <li class="nav-item">
              <p class="nav-link"><?= $data['detail_book']['pages']; ?></p>
            </li>
          </ul>

          <ul class="nav" id="genre">
            <li class="nav-item">
              <p class="nav-link" id="listsatu">Genre</p>
            </li>
            <li class="nav-item">
              <p class="nav-link" id="listdua">:</p>
            </li>
            <li>
              <p class="nav-link"><?= $data['detail_book']['genre_name']; ?></p>
            </li>
          </ul>

          <div class="container-fluida">
            <div class="row">
              <div class="col-auto" id="listsatugenre">Synopsis</div>
              <div class="col-auto" id="listdua">:</div>
              <div class="col" id="listtigagenre">
                <?= $data['detail_book']['synopsis']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-3">
        <div class="row">
          <div class="col">
            <?php Flasher::flash(); ?>
          </div>
        </div>
        <h5 class="card-title" id="review">Review</h5>
        <div class="card mb-3">
          <div class="card-bodybawah">
            <form
              action="<?= BASEURL; ?>/BookController/insertComment"
              method="POST"
              class="form-group"
              id="reviewForm"
            >
              <input
                type="hidden"
                name="book_id"
                value="<?= $_SESSION['book_id'];?>"
              />
              <textarea
                class="form-control"
                rows="5"
                id="reviewText"
                name="comment"
                placeholder="Review here..."
              ></textarea>
              <div class="mt-3 d-flex justify-content-start button">
                <button type="submit" class="btn btn-primary" id="submit">
                  Submit
                </button>
              </div>
            </form>

            <div id="comments">
              <h5 class="card-title" id="comments">Comments</h5>

              <?php foreach($data['comment'] as $comment) : ?>
              <div class="card mb-3">
                <div class="card-bodycomment">
                  <div class="comment-group">
                    <ul class="nav">
                      <li class="nav-item">
                        <p class="nav-link" id="listsatu">Name</p>
                      </li>
                      <li class="nav-item">
                        <p class="nav-link" id="listdua">:</p>
                      </li>
                      <li class="nav-item">
                        <p class="nav-link">
                          <?= htmlspecialchars($comment["name"]); ?>
                        </p>
                      </li>
                    </ul>

                    <ul class="nav">
                      <li class="nav-item">
                        <p class="nav-link" id="listsatu">Comment</p>
                      </li>
                      <li class="nav-item">
                        <p class="nav-link" id="listdua">:</p>
                      </li>
                      <li class="nav-item">
                        <p class="nav-link">
                          <?= htmlspecialchars($comment["comment"]); ?>
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
