<!-- Step 3 -->
<h6>Step 3</h6>
<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="eventName1">Event Name :</label>
                <input type="text" class="form-control" id="eventName1">
            </div>
            <div class="form-group">
                <label for="eventType1">Event Type :</label>
                <select class="custom-select form-control" id="eventType1" data-placeholder="Type to search cities"
                    name="eventType1">
                    <option value="Banquet">Banquet</option>
                    <option value="Fund Raiser">Fund Raiser</option>
                    <option value="Dinner Party">Dinner Party</option>
                    <option value="Wedding">Wedding</option>
                </select>
            </div>
            <div class="form-group">
                <label for="eventLocation1">Event Location :</label>
                <select class="custom-select form-control" id="eventLocation1" name="location">
                    <option value="">Select City</option>
                    <option value="Amsterdam">Amsterdam</option>
                    <option value="Berlin">Berlin</option>
                    <option value="Frankfurt">Frankfurt</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobTitle2">Event Date - Time :</label>
                <div class='input-group'>
                    <input type='text' class="form-control datetime" id="jobTitle2" />
                    <span class="input-group-addon">
                        <span class="ft-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="eventStatus1">Event Status :</label>
                <select class="custom-select form-control" id="eventStatus1" name="eventStatus">
                    <option value="Planning">Planning</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Finished">Finished</option>
                </select>
            </div>
            <div class="form-group">
                <label>Requirements :</label>
                <div class="c-inputs-stacked">
                    <div class="d-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="status" class="custom-control-input" id="staffing">
                        <label class="custom-control-label" for="staffing">Staffing</label>
                    </div>
                    <div class="d-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="status" class="custom-control-input" id="catering">
                        <label class="custom-control-label" for="catering">Catering</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>