<div id="mdladdproduct" class="modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md"style="max-width: 750px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;" id="txtopenproductheader">Community</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="clearfieldvalues()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>

                
                </div>

                <div class="row mb-2">
                    <div class="col-md-12">
                        <form method="post" action="#" enctype="multipart/form-data" id="frmUploadProductPic">
                            <div class="row" id="appendprodimage">

                            </div>

                            <div class="row" id="appendprodimage2">

                            </div>

                            <input type="hidden" class="clearinfo" id="hiddenwala" name="hiddenwala">
                            <input type="hidden" class="clearinfo" name="txtproductimageID" id="txtproductimageID">
                        </form>
                        <form method="post" action="#" enctype="multipart/form-data">
                           
                        

                            <div class="modaldata"></div>

                        </form>

                       
                    </div>

                    
                </div>
            </div>

            <div class="modal-footer" style="padding: 10px 15px;">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn waves-effect waves-light btn-secondary float-right buttonproduct btnprodsave" onclick="addproduct();" style="background-color: #79a206 !important; border: 1px solid #79a206 !important;">Save Blog</button>

                        <button type="button" class="btn waves-effect waves-light btn-secondary float-right buttonproduct btnprodupdate" onclick="editproduct();" style="background-color: #79a206 !important; border: 1px solid #79a206 !important;display: none;">Update Product</button>
                    </div> 
                </div>
            </div>

        </div>
    </div>
</div>

