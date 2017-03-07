<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body">

      <div class="form-group">

        <!-- UNIT NAME FIELD -->
        <div class="col-md-4">
          @if ($errors->has('unit_name'))
          <div class="control-group error has-error">
            <label class="control-label" for="house_num">
              <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              Unit Name:</label>
            </div>
            @else
            <label class="control-label" for="unit_name">Unit Name:</label>
            @endif
            <input id="unit_name" name="unit_name" value="{{ $listing-> unit_name}}" class="form-control input-md" type="text">
          </div>

          <!-- LISTING TYPE FIELD -->
          <div class="col-md-4">
            @if ($errors->has('type'))
            <div class="control-group error has-error">
              <label class="control-label" for="type">
                <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Type:</label>
              </div>
              @else
              <label class="control-label" for="type">Type:</label>
              @endif
              <select id="type" name="type" class="form-control">
                <option @if ($listing->type == 'For Rent') selected="selected" @endif value="For Rent">For Rent</option>
                <option @if ($listing->type == 'For Sale') selected="selected" @endif value="For Sale">For Sale</option>
                <option @if ($listing->type == 'Unavailable') selected="selected" @endif value="Unavailable">Unavailable</option>
              </select>
            </div>
          </div>

          <div class="form-group">

            <!-- LISTING STREET NUMBER -->
            <div class="col-md-2">
              @if ($errors->has('house_num'))
              <div class="control-group error has-error">

                <label class="control-label" for="house_num">
                  <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  Street Number:</label>

                </div>
                @else
                <label class="control-label" for="house_num">Street Number:</label>
                @endif
                <input id="house_num" name="house_num" value="{{ $listing-> house_num }}" class="form-control input-md" type="text">
              </div>


              <!-- LISTING STREET NAME -->
              <div class="col-md-8">
                @if ($errors->has('street_name'))
                <div class="control-group error has-error">
                  <label class="control-label" for="house_num">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Street Name:
                  </label>
                </div>
                @else
                <label class="control-label" for="house_num">Street Name:</label>
                @endif
                <input id="street_name" name="street_name" value="{{ $listing-> street_name }}" class="form-control input-md" type="text">

              </div>

              <!-- LISTING APT/SUITE NUMBER FIELD-->
              <div class="col-md-2">
                @if ($errors->has('apt_num'))
                <div class="control-group error has-error">
                  <label class="control-label" for="house_num">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Apt/Suite
                  </label>
                </div>
                @else
                <label class="control-label" for="house_num">Apt/Suite:</label>
                @endif
                <input id="apt_num" name="apt_num" value="{{ $listing-> apt_num }}" class="form-control input-md" type="text">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">

              <!-- LISTING CITY FIELD -->
              <div class="col-md-6">
                @if ($errors->has('city'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    City:
                  </label>
                </div>
                @else
                <label class="control-label">City:</label>
                @endif
                <input id="city" name="city" value="{{ $listing-> city }}" class="form-control input-md" type="text">

              </div>

              <!-- LISTING STATE FIELD -->
              <div class="col-md-4">
                @if ($errors->has('state'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    State:
                  </label>
                </div>
                @else
                <label class="control-label">State:</label>
                @endif
                <input id="state" name="state" value="{{ $listing-> state }}" class="form-control input-md" type="text">
              </div>

              <!-- LISTING ZIP FIELD -->
              <div class="col-md-2">
                @if ($errors->has('zip'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Zip:
                  </label>
                </div>
                @else
                <label class="control-label">Zip:</label>
                @endif
                <input id="zip" name="zip" value="{{ $listing-> zip }}" class="form-control input-md" type="text">

              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">

              <!-- LISTING PRICE FIELD -->
              <div class="col-md-3">
                @if ($errors->has('price'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Price:
                  </label>
                </div>
                @else
                <label class="control-label">Price:</label>
                @endif
                <input id="price" name="price" value="{{ $listing-> price }}" class="form-control input-md" type="text">
              </div>

              <!-- LISTING SQUARE FEET FIELD -->
              <div class="col-md-3">
                @if ($errors->has('sq_ft'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Square Feet:
                  </label>
                </div>
                @else
                <label class="control-label">Square Feet:</label>
                @endif
                <input id="sq_ft" name="sq_ft" value="{{ $listing-> sq_ft }}" class="form-control input-md" type="text">
              </div>

              <!-- LISTING BEDROOMS FIELD -->
              <div class="col-md-3">
                @if ($errors->has('bedrooms'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Bedrooms:
                  </label>
                </div>
                @else
                <label class="control-label">Bedrooms:</label>
                @endif
                <select id="bedrooms" name="bedrooms" class="form-control">
                  <option @if ($listing->bedrooms == '1') selected="selected" @endif value="1">1</option>
                  <option @if ($listing->bedrooms == '2') selected="selected" @endif value="2">2</option>
                  <option @if ($listing->bedrooms == '3') selected="selected" @endif value="3">3</option>
                  <option @if ($listing->bedrooms == '4') selected="selected" @endif value="4">4</option>
                  <option @if ($listing->bedrooms == '5') selected="selected" @endif value="5">5</option>
                  <option @if ($listing->bedrooms == '6') selected="selected" @endif value="6">6</option>
                  <option @if ($listing->bedrooms == '7') selected="selected" @endif value="7">7</option>
                  <option @if ($listing->bedrooms == '8') selected="selected" @endif value="8">8</option>
                  <option @if ($listing->bedrooms == '9') selected="selected" @endif value="9">9</option>
                  <option @if ($listing->bedrooms == '10') selected="selected" @endif value="10">10+</option>
                </select>
              </div>

              <!-- LISTING BATHROOMS FIELD -->
              <div class="col-md-3">
                @if ($errors->has('bathrooms'))
                <div class="control-group error has-error">
                  <label class="control-label">
                    <span class="control-group glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Bathrooms:
                  </label>
                </div>
                @else
                <label class="control-label">Bathrooms:</label>
                @endif
                <select id="bathrooms" name="bathrooms" class="form-control">
                  <option @if ($listing->bathrooms == '1') selected="selected" @endif value="1">1</option>
                  <option @if ($listing->bathrooms == '1.5') selected="selected" @endif value="1.5">1.5</option>
                  <option @if ($listing->bathrooms == '2') selected="selected" @endif value="2">2</option>
                  <option @if ($listing->bathrooms == '2.5') selected="selected" @endif value="2.5">2.5</option>
                  <option @if ($listing->bathrooms == '3') selected="selected" @endif value="3">3</option>
                  <option @if ($listing->bathrooms == '3.5') selected="selected" @endif value="3.5">3.5</option>
                  <option @if ($listing->bathrooms == '4') selected="selected" @endif value="4">4</option>
                  <option @if ($listing->bathrooms == '4.5') selected="selected" @endif value="4.5">4.5</option>
                  <option @if ($listing->bathrooms == '5') selected="selected" @endif value="5">5</option>
                  <option @if ($listing->bathrooms == '5.5') selected="selected" @endif value="5.5">5.5</option>
                  <option @if ($listing->bathrooms == '6') selected="selected" @endif value="6">6</option>
                  <option @if ($listing->bathrooms == '6.5') selected="selected" @endif value="6.5">6.5</option>
                  <option @if ($listing->bathrooms == '7') selected="selected" @endif value="7">7</option>
                  <option @if ($listing->bathrooms == '7.5') selected="selected" @endif value="7.5">7.5</option>
                  <option @if ($listing->bathrooms == '8') selected="selected" @endif value="8">8</option>
                  <option @if ($listing->bathrooms == '8.5') selected="selected" @endif value="8.5">8.5</option>
                  <option @if ($listing->bathrooms == '9') selected="selected" @endif value="9">9</option>
                  <option @if ($listing->bathrooms == '9.5') selected="selected" @endif value="9.5">9.5</option>
                  <option @if ($listing->bathrooms == '10+') selected="selected" @endif value="10+">10+</option>
                </select>
              </div>

            </div>

          </div>
        </div>
      </div>
