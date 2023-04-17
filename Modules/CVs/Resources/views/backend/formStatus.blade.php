<div class="row">
    <div class="col-12">
            <div class="form-group ">
            <!-- <form action="{{route("backend.$module_name.update", $data->id)}}" method="PATCH" id="rati"> -->
                <select name="status" class="form-control select2 status_CVS" onchange="onChangeStatusCVS(this)" id={{$data->id}}> 
                    <option value="0" {{ ($data->status) == 0 ? 'selected' : ''}}>Open</option>
                    <option value="1" {{ ($data->status) == 1 ? 'selected' : ''}}>Inprogress</option>
                    <option value="2" {{ ($data->status) == 2 ? 'selected' : ''}}>Interview</option>
                    <option value="3" {{ ($data->status) == 3 ? 'selected' : ''}}>Done</option>
                    <option value="4" {{ ($data->status) == 4 ? 'selected' : ''}}>Cancel</option>
                </select>
                <!-- </form> -->
            </div>
    </div>
</div>

