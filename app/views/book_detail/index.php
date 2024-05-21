
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

    <img src="<?= BASEURL; ?>/images/book_cover.png" class="card-img-top" id="cover" />

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" id="judul">The Boys Limited Edition</h1>

          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" id="listsatu">Author</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="listdua">:</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Dan Osaka</a>
            </li>
          </ul>

          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" id="listsatu">Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="listdua">:</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">203</a>
            </li>
          </ul>

          <ul class="nav" id="genre">
            <li class="nav-item">
              <a class="nav-link" id="listsatu">Genre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="listdua">:</a>
            </li>
            <li>
              <a class="nav-link">Action, Thriller </a>
            </li>
          </ul>

          <div class="container-fluida">
            <div class="row">
              <div class="col-auto" id="listsatugenre">Synopsis</div>
              <div class="col-auto" id="listdua">:</div>
              <div class="col" id="listtigagenre">
                The Boys is set in a universe where super-powered individuals
                are recognized as heroes by the general public and work for a
                powerful corporation known as Vought International, which
                markets and monetizes them. Outside of their heroic personas,
                most are arrogant, selfish, and corrupt.
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-3">
        <h5 class="card-title" id="review">Review</h5>
        <div class="card mb-3">
          <div class="card-bodybawah">
            <form id="reviewForm">
              <textarea
                class="form-control"
                rows="5"
                id="reviewText"
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
              <div class="card mb-3">
                <div class="card-bodycomment">
                  <div class="comment-group">
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" id="listsatu">Name</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="listdua">:</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">Fakhry</a>
                      </li>
                    </ul>

                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" id="listsatu">Comment</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="listdua">:</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"
                          >This Book Is Really Great! </a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

