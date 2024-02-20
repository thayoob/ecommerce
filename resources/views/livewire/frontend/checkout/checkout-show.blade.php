<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <div class="row">

                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">₹{{ $this->totalProductAmount }}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br />
                        <small>* Tax and other charges are included ?</small>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control"
                                    placeholder="Enter Full Name" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" name="phone" class="form-control"
                                    placeholder="Enter Phone Number" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter Email Address" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" name="pincode" class="form-control"
                                    placeholder="Enter Pin-code" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea name="address" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Select Payment Mode: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab"
                                            data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button"
                                            role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash
                                            on Delivery</button>
                                        <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill"
                                            data-bs-target="#onlinePayment" type="button" role="tab"
                                            aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel"
                                            aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Cash on Delivery Mode</h6>
                                            <hr />
                                            <button type="button" class="btn btn-primary">Place Order (Cash on
                                                Delivery)</button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                            aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Online Payment Mode</h6>
                                            <hr />
                                            <button type="button" class="btn btn-warning">Pay Now (Online
                                                Payment)</button>
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
