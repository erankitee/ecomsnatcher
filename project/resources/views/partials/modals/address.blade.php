<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action="{{route('address.store')}}" method="POST">
    {{csrf_field()}}
    <!-- Modal content-->
    <div class="modal-content address_popup">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-left">Add New Address</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Full Name <span>*</span></label>
              <input type="text" class="form-control" name="fullName" required>
            </div>
          </div>
           <div class="col-md-6">
           <div class="form-group">
             <label>Mobile <span>*</span></label>
              <input type="text" class="form-control"  name="mobile" required>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <label>Postal Code <span>*</span></label>
             <input type="text" class="form-control"  name="postalCode" required>
            </div>
          </div>
           <div class="col-md-6">
           <div class="form-group">
             <label>Town/City <span>*</span></label>
              <input type="text" class="form-control"   name="city" required>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <label>State <span>*</span></label>
             <input type="text" class="form-control"  name="state" required>
            </div>
          </div>
           <div class="col-md-6">
           <div class="form-group">
             <label>Flat, House No... <span>*</span></label>
              <input type="text" class="form-control"  name="house" required>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
             <label>Phone </label>
             <input type="text" class="form-control" name="phone"> 
            </div>
          </div>
           <div class="col-md-6">
           <div class="form-group">
             <label>Landmark</label>
              <input type="text" class="form-control"  name="landmark">
            </div>
          </div>
        </div> 
        <div class="row">
           <div class="col-md-12">
            <div class="form-group">
              <label>Area, Colony, Street... </label>
             <input type="text" class="form-control"  name="area">
            </div>
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-default">Add</button>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>