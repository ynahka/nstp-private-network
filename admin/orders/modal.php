<style>
  .root {
    padding: 1rem;
    border-radius: 5px;
    box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.3);
  }

  .figure {
    display: flex;
  }

  .figure img {
    width: 8rem;
    height: 8rem;
    border-radius: 15%;
    border: 1.5px solid #f05a00;
    margin-right: 1.5rem;
    padding: 1rem;
  }

  .figure figcaption {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
  }

  .figure figcaption h4 {
    font-size: 1.4rem;
    font-weight: 500;
  }

  .figure figcaption h6 {
    font-size: 1rem;
    font-weight: 300;
  }

  .figure figcaption h2 {
    font-size: 1.6rem;
    font-weight: 500;
  }

  .order-track {
    margin-top: 2rem;
    padding: 0 1rem;
    padding-top: 2.5rem;
    display: flex;
    flex-direction: column;
  }

  .order-track-step {
    display: flex;
    height: 5rem;
  }

  .order-track-step:last-child {
    overflow: hidden;
    height: 4rem;
  }

  .order-track-step:last-child .order-track-status span:last-of-type {
    display: none;
  }

  .order-track-status {
    margin-right: 1.5rem;
    position: relative;
  }

  .order-track-status-dot {
    display: block;
    width: 1rem;
    height: 1rem;
    border-radius: 50%;
    background: #f05a00;
  }

  .order-track-status-line {
    display: block;
    margin: 0 auto;
    width: 2px;
    height: 5rem;
    background: #f05a00;
  }

  .order-track-text-stat {
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 3px;
  }

  .order-track-text-sub {
    font-size: 1rem;
    font-weight: 300;
  }

  .order-track {
    transition: all .3s height 0.3s;
    transform-origin: top center;
  }
</style>
<div id="mdlopenorderdet" class="modal" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" style="max-width: 950px;">
    <div class="modal-content">

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <div style="display: flex;justify-content: space-between !important;">
              <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Order Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="clearuseracc()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div id="prodbuynowimg"></div>
            <section class="root">

              <div class="order-track">
                <div class="order-track-step">
                  <div class="order-track-status">
                    <span class="order-track-status-dot"></span>
                    <span class="order-track-status-line"></span>
                  </div>
                  <div class="order-track-text">
                    <p class="order-track-text-stat order-track-text-statstatus order-track-text-stat1">
                    </p>
                    <span class="order-track-text-sub order-track-text-sub1"></span>
                  </div>
                </div>
                <div class="order-track-step">
                  <div class="order-track-status">
                    <span class="order-track-status-dot"></span>
                    <span class="order-track-status-line"></span>
                  </div>
                  <div class="order-track-text">
                    <p class="order-track-text-stat order-track-text-stat3">To Ship</p>
                    <span class="order-track-text-sub order-track-text-sub3"></span>
                  </div>
                </div>
                <div class="order-track-step">
                  <div class="order-track-status">
                    <span class="order-track-status-dot"></span>
                    <span class="order-track-status-line"></span>
                  </div>
                  <div class="order-track-text">
                    <p class="order-track-text-stat order-track-text-stat4">For Delivery</p>
                    <span class="order-track-text-sub order-track-text-sub4"></span>
                  </div>
                </div>
                <div class="order-track-step">
                  <div class="order-track-status">
                    <span class="order-track-status-dot"></span>
                    <span class="order-track-status-line"></span>
                  </div>
                  <div class="order-track-text">
                    <p class="order-track-text-stat order-track-text-stat5">Completed</p>
                    <span class="order-track-text-sub order-track-text-sub5"></span>
                  </div>
                </div>
              </div>
            </section>
            <div style="font-size: 20px;margin-top: 50px;font-weight: bold;">
              <div class="courierdata"></div>
              <div class="trackingnumberdata"></div>
            </div>
          </div>

          <div class="col-md-7">
            <div style="margin-bottom: 20px;">
              <h2 class="card-title h1proddetname" style="font-weight:500; font-size: 22px;line-height: 25px; margin-bottom: 2px;" id="txtprodbuynowname"></h2>
              <h5 style="font-weight:400;">Quantity:&nbsp;<span id="txtprodbuynowqty" style="font-weight:300"></span></h5>
            </div>

            <h1 style="color: #f58729;line-height: 1; margin-bottom: 10px;"><span>₱</span><span id="txtprodbuynowprice"></span></h1>


            <div class="card" style="margin-bottom: 10px;margin-top: 20px;">
              <div class="card-header" style="background-color: #baca91; border-bottom: 0px;">
                <h4 class="" style="margin-bottom:0px; font-weight: 400;">Shipping Address</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h5 class="fontsizepaybot" style="font-weight: 400;"><i class="fas fa-user"></i>&nbsp;<span id="txtprodbuynowuser"></span></h5>
                    <h5 class="fontsizepaybot" style="font-weight: 400;"><i class="fas fa-phone"></i>&nbsp;<span id="txtprodbuynowphone"></span>
                    </h5>
                    <h5 class="fontsizepaybot" style="font-weight: 400; margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>&nbsp;<span id="txtprodbuynowadd"></span></h5>
                    <input type="hidden" class="form-control" id="txtLat">
                    <input type="hidden" class="form-control" id="txtLong">
                    <div id="map_canvas" style="height: 250px; width:100% !important; border-radius: 0px !important;">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card" style="margin-bottom: 20px;">
              <div class="card-header" style="background-color: #baca91; border-bottom: 0px;">
                <h4 class="" style="margin-bottom:0px; font-weight: 400;">Payment Method</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <div class="card" style="border: 1px solid #343a40;margin-bottom: 0px;">
                      <div class="card-body collapse show" style="padding: .5rem;">
                        <h4 class="card-title fontsizepaybot" style="margin-bottom: 5px;"><i class="far fa-money-bill-alt" style="color:#f58729;"></i>&nbsp;<span id="txtorddetpaymenttype"></span></h4>
                        <p class="card-text fontsizepaybot"><i class="far fa-money-bill-alt" style="visibility: hidden;"></i>&nbsp;<span id="txtpaymentcaption"></span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card gcashpayment hide" style="margin-bottom: 20px;">
              <div class="card-header" style="background-color: #baca91; border-bottom: 0px;">
                <h4 class="" style="margin-bottom:0px; font-weight: 400;">Gcash Details</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <div class="card" style="margin-bottom: 0px;">
                      <div class="card-body collapse show" style="padding: 0rem;">
                        <h5 style="font-weight:400;">Reference Number:&nbsp;<span id="txtprodbuynowrefnum" style="font-weight:300"></span></h5>
                        <div id="prodbuynowgcashimg"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card" style="margin-bottom: 20px;">
              <div class="card-header" style="background-color: #baca91; border-bottom: 0px;">
                <h4 class="" style="margin-bottom:0px; font-weight: 400;">Order Summary</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-12">
                        <span>
                          <h5 class="float-right fontsizepaybot" id="txtprodbuynowsubtotal">
                            0.00</h5>
                        </span>
                        <h5 class="fontsizepaybot"><span style="font-weight: 500;">Subtotal</span> <span></span></h5>
                      </div>

                      <div class="col-12">
                        <span>
                          <h5 class="float-right fontsizepaybot" id="txtprodbuynowshipfee">
                            0.00</h5>
                        </span>
                        <h5 class="fontsizepaybot"><span style="font-weight: 500;">Shipping
                            Fee</span> <span></span></h5>
                      </div>

                      <div class="col-12">
                        <hr style="margin-top:10px">
                      </div>

                      <div class="col-12">
                        <span>
                          <h5 class="float-right fontsizepaybot" id="txtprodbuynowtotal">0.00
                          </h5>
                        </span>
                        <h5 class="fontsizepaybot"><span style="font-weight: 500;">Total</span>
                          <span></span>
                        </h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div id="mdlviewpaymentphoto" class="modal">
  <div class="modal-dialog modal-dialog-centered modal-md" style="max-width: 600px;">
    <div class="modal-content">
      <img src="assets/images/noimage5.png" class="img-thumbnail" id="viewpaymentimg">
    </div>
  </div>
</div>