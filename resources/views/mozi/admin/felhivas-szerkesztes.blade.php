<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
  <div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
      <div
        id="kt_app_toolbar_container"
        class="app-container container-xxl d-flex flex-stack"
      >
        <div
          class="page-title d-flex flex-column justify-content-center flex-wrap me-3"
        >
          <h1
            class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"
          >
            Felhívások szerkesztése
          </h1>
          <ul
            class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1"
          >
            <li class="breadcrumb-item text-muted">
              <a
                href="{{ route('mozi.fooldal') }}"
                class="text-muted text-hover-primary"
                >Adminisztráció</a
              >
            </li>
            <li class="breadcrumb-item">
              <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Felhívás szerkesztés</li>
          </ul>
        </div>
      </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
      <div id="kt_app_content_container" class="app-container container-md">
        <div class="row">
          <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Felhívások listázása</span>
                <span class="text-muted mt-1 fw-semibold fs-7">
                  Jelenleg <b>{{ $announcements->total() }} darab</b> felhívás található
                </span>
              </h3>
              <div class="card-toolbar">
                <div>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="ki-duotone ki-magnifier fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                      </i>
                    </span>
                    <input
                      type="text"
                      class="form-control me-2 mb-2 mb-md-0"
                      wire:model.live.debounce.300ms="kereses"
                      placeholder="Felhívás címe vagy tartalma"
                    />
                  </div>
                </div>
                <a
                  href="{{ route('mozi.admin.felhivasfeltoltes') }}"
                  class="btn btn-sm btn-light-primary"
                >
                  <i class="ki-duotone ki-plus fs-2"></i>Új felhívás létrehozása
                </a>
              </div>
            </div>

            @if ($announcements->count() > 0)
            <div class="card-body py-3">
              <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4">
                  <thead>
                    <tr class="fw-bold text-muted bg-light">
                      <th class="ps-4 min-w-330px rounded-start">Cím</th>
                      <th class="min-w-400px">Tartalom</th>
                      <th class="min-w-150px">Dátum</th>
                      <th class="min-w-150px">Létrehozta</th>
                      <th class="min-w-180px text-end rounded-end"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($announcements as $announcement)
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="d-flex justify-content-start flex-column">
                            <a
                              href="#"
                              class="text-dark fw-bold text-hover-primary mb-1 fs-6"
                              >{{ $announcement->title }}</a
                            >
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="text-muted fw-semibold d-block fs-7">{{
                          Str::limit($announcement->content, 100)
                        }}</span>
                      </td>
                      <td>
                        <span class="text-muted fw-semibold d-block fs-7">{{
                          $announcement->date
                        }}</span>
                      </td>
                      <td>
                        <span class="text-muted fw-semibold d-block fs-7">{{
                          $announcement->createdby ? $announcement->createdby :
                          'ChromeCinema'
                        }}</span>
                      </td>
                      <td class="text-end">
                        <a
                          href="#"
                          data-bs-toggle="modal"
                          data-bs-target="#admin_announcementszerkesztes"
                          wire:click.prevent="keresdafelhivast({{ $announcement->id }})"
                          class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                        >
                          <i class="ki-duotone ki-pencil fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                          </i>
                        </a>
                        <a
                          href="#"
                          wire:click.prevent="felhivastorles({{ $announcement->id }})"
                          class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                        >
                          <i class="ki-duotone ki-trash fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                          </i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $announcements->links() }}
              </div>
            </div>
            @else
            <div class="card-body py-3 flex-center text-center p-10">
              <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4">
                  <thead>
                    <tr class="fw-bold text-muted bg-light">
                      <th class="ps-4 min-w-330px rounded-start">Cím</th>
                      <th class="min-w-400px">Tartalom</th>
                      <th class="min-w-150px">Dátum</th>
                      <th class="min-w-150px">Létrehozta</th>
                      <th class="min-w-180px text-end rounded-end"></th>
                    </tr>
                  </thead>
                </table>
                <div class="alert alert-warning">Nincs találat a keresésre.</div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    window.addEventListener("close-modal", (event) => {
      $("#admin_announcementszerkesztes").modal("hide");
    });
    window.addEventListener("open-modal", (event) => {
      $("#admin_announcementszerkesztes").modal("show");
    });
  </script>

  <div
    class="modal fade"
    id="admin_announcementszerkesztes"
    wire:ignore.self
    tabindex="-1"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-l">
      <div class="modal-content rounded">
        <div class="modal-header justify-content-end border-0 pb-0">
          <div
            class="btn btn-sm btn-icon btn-active-color-primary"
            data-bs-dismiss="modal"
          >
            <i class="ki-duotone ki-cross fs-1">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
          </div>
        </div>
        <form
          action="m-0"
          class="form mb-2 fv-plugins-bootstrap5 fv-plugins-framework"
          method="post"
          wire:submit.prevent="mentes"
        >
          <div class="modal-body pt-0 pb-15 px-5 px-xl-25">
            <div class="mb-2 text-center">
              <h1 class="mb-3">Felhívás szerkesztése</h1>
              <div class="text-muted fw-semibold fs-5">Itt tudod szerkeszteni a felhívást.</div>
            </div>

            <div class="d-flex flex-column">
              <div class="row mt-10">
                <div class="col-md-12" bis_skin_checked="1">
                  <div class="card me-xl-3 mb-md-0 mb-6" bis_skin_checked="1">
                    <div
                      class="card-body card-md-stretch p-lg-17"
                      bis_skin_checked="1"
                    >
                      <div
                        class="d-flex flex-column flex-lg-row mb-17"
                        bis_skin_checked="1"
                      >
                        <div
                          class="flex-lg-row-fluid me-0 me-lg-25"
                          bis_skin_checked="1"
                        >
                          <div class="row mb-5" bis_skin_checked="1">
                            <div
                              class="d-flex flex-column mb-5 fv-row"
                              bis_skin_checked="1"
                            >
                              <label class="required fs-5 fw-semibold mb-2">Cím</label>
                              <input
                                class="form-control form-control-solid"
                                placeholder=""
                                wire:model="title"
                              />
                            </div>

                            <div
                              class="d-flex flex-column mb-5 fv-row"
                              bis_skin_checked="1"
                            >
                              <label class="required fs-5 fw-semibold mb-2">Tartalom</label>
                              <textarea
                                class="form-control form-control-solid"
                                placeholder=""
                                wire:model="content"
                                rows="5"
                              ></textarea>
                            </div>

                            <div
                              class="d-flex flex-column mb-5 fv-row"
                              bis_skin_checked="1"
                            >
                              <label class="required fs-5 fw-semibold mb-2">Dátum</label>
                              <input
                                type="datetime-local"
                                class="form-control form-control-solid"
                                wire:model="date"
                              />
                            </div>

                            <!-- createdby mező -->
                            <div
                              class="d-flex flex-column mb-5 fv-row"
                              bis_skin_checked="1"
                            >
                              <label class="required fs-5 fw-semibold mb-2"
                                >Létrehozó ID</label
                              >
                              <input
                                type="number"
                                class="form-control form-control-solid"
                                placeholder=""
                                wire:model="createdby"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex flex-center flex-row-fluid pt-12">
              <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Kilépés</button>
              <button
                type="submit"
                class="btn btn-primary"
                wire:loading.attr="disabled"
              >
                <span wire:loading.remove>
                  Szerkesztés véglegesítése
                </span>
                <span wire:loading>
                  Feldolgozás...
                  <span
                    class="spinner-border spinner-border-sm me-1"
                    role="status"
                    aria-hidden="true"
                  ></span>
                </span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
