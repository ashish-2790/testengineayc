<form wire:submit.prevent="submit" class="pt-3">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success text-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger text-rose-600">
                {{ session('error') }}
            </div>
        @endif
    </div>
    @if($logged_in_user_role == 'Admin')
        <div class="form-group {{ $errors->has('user.related_school_name_id') ? 'invalid' : '' }}">
            <label class="form-label"
                   for="related_school_name">{{ trans('cruds.user.fields.related_school_name') }}</label>
            <x-select-list class="form-control" id="related_school_name" name="related_school_name"
                           :options="$this->listsForFields['related_school_name']"
                           wire:model="user.related_school_name_id"/>
            <div class="validation-message">
                {{ $errors->first('user.related_school_name_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.related_school_name_helper') }}
            </div>
        </div>
    @endif
    <div class="row m-0 g-5  flex">
        <div class="w-full lg:w-4/12 px-4 pt-4 form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
            <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            <div class="validation-message">
                {{ $errors->first('user.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.name_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
            <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
            <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
            <div class="validation-message">
                {{ $errors->first('user.email') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.email_helper') }}
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
            <label class="form-label required" for="password">{{ trans('cruds.user.fields.password') }}</label>
            <input class="form-control" type="password" name="password" id="password" required
                   wire:model.defer="password">
            <div class="validation-message">
                {{ $errors->first('user.password') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.password_helper') }}
            </div>
        </div>

    </div>
    <div class="row m-0 g-5  flex">
        @if($logged_in_user_role == 'Admin')
            <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
                <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles"
                               :options="$this->listsForFields['roles']" multiple/>
                <div class="validation-message">
                    {{ $errors->first('roles') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 pt-5 form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
                <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
                <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
                <div class="validation-message">
                    {{ $errors->first('user.locale') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.locale_helper') }}
                </div>
            </div>
            <div class="form-group w-full lg:w-4/12 px-4 {{ $errors->has('user.is_approved') ? 'invalid' : '' }}">
                <input class="form-control" type="checkbox" name="is_approved" id="is_approved" wire:model.defer="user.is_approved">
                <label class="form-label inline ml-1" for="is_approved">{{ trans('cruds.user.fields.is_approved') }}</label>
                <div class="validation-message">
                    {{ $errors->first('user.is_approved') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.is_approved_helper') }}
                </div>
            </div>


        @endif
    </div>

    @if($logged_in_user_role == 'School')
        <div class="row m-0 g-5  flex">
            <div class="w-full lg:w-4/12 px-4 pt-4 form-group {{ $errors->has('user.related_class_name_id') ? 'invalid' : '' }}">
                <label class="form-label"
                       for="related_class_name">{{ trans('cruds.user.fields.related_class_name') }}</label>
                <x-select-list class="form-control" id="related_class_name" name="related_class_name"
                               :options="$this->listsForFields['related_class_name']"
                               wire:model="user.related_class_name_id"/>
                <div class="validation-message">
                    {{ $errors->first('user.related_class_name_id') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.related_class_name_helper') }}
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4 form-group {{ $errors->has('related_test_type') ? 'invalid' : '' }}">
                <label class="form-label"
                       for="related_test_type">{{ trans('cruds.user.fields.related_test_type') }}</label>
                <x-select-list class="form-control" id="related_test_type" name="related_test_type"
                               wire:model="related_test_type" :options="$this->listsForFields['related_test_type']"
                               multiple/>
                <div class="validation-message">
                    {{ $errors->first('related_test_type') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.related_test_type_helper') }}
                </div>
            </div>
        </div>

        <div class="row m-0 g-5  flex">
            <div class="w-full lg:w-4/12 px-4 pt-4 form-group {{ $errors->has('user.phone_no') ? 'invalid' : '' }}">
                <label class="form-label" for="phone_no">{{ trans('cruds.user.fields.phone_no') }}</label>
                <input class="form-control" type="text" name="phone_no" id="phone_no" wire:model.defer="user.phone_no">
                <div class="validation-message">
                    {{ $errors->first('user.phone_no') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.phone_no_helper') }}
                </div>
            </div>

            <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.age') ? 'invalid' : '' }}">
                <label class="form-label" for="age">{{ trans('cruds.user.fields.age') }}</label>
                <input class="form-control" type="text" name="age" id="age" wire:model.defer="user.age">
                <div class="validation-message">
                    {{ $errors->first('user.age') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.age_helper') }}
                </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.date_of_birth') ? 'invalid' : '' }}">
                <label class="form-label" for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
                <x-date-picker class="form-control" wire:model="user.date_of_birth" id="date_of_birth"
                               name="date_of_birth" picker="date"/>
                <div class="validation-message">
                    {{ $errors->first('user.date_of_birth') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.date_of_birth_helper') }}
                </div>
            </div>

        </div>

        <div class="row m-0 g-5  flex">
            <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.gender') ? 'invalid' : '' }}">
                <label class="form-label">{{ trans('cruds.user.fields.gender') }}</label>
                @foreach($this->listsForFields['gender'] as $key => $value)
                    <label class="radio-label"><input type="radio" name="gender" wire:model="user.gender"
                                                      value="{{ $key }}">{{ $value }}</label>
                @endforeach
                <div class="validation-message">
                    {{ $errors->first('user.gender') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.gender_helper') }}
                </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.disability_status') ? 'invalid' : '' }}">
                <label class="form-label">{{ trans('cruds.user.fields.disability_status') }}</label>
                @foreach($this->listsForFields['disability_status'] as $key => $value)
                    <label class="radio-label"><input type="radio" name="disability_status"
                                                      wire:model="user.disability_status"
                                                      value="{{ $key }}">{{ $value }}</label>
                @endforeach
                <div class="validation-message">
                    {{ $errors->first('user.disability_status') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.disability_status_helper') }}
                </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 form-group {{ $errors->has('user.qualification_status') ? 'invalid' : '' }}">
                <label class="form-label">{{ trans('cruds.user.fields.qualification_status') }}</label>
                @foreach($this->listsForFields['qualification_status'] as $key => $value)
                    <label class="radio-label"><input type="radio" name="qualification_status"
                                                      wire:model="user.qualification_status"
                                                      value="{{ $key }}">{{ $value }}</label>
                @endforeach
                <div class="validation-message">
                    {{ $errors->first('user.qualification_status') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.qualification_status_helper') }}
                </div>
            </div>

        </div>
        <div class="row m-0 g-5  flex">
            <div class="col-span-12">
                <div class="container">
                    <h5 class="text-xl font-bold mb-4">Academic Details:</h5>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border border-gray-300">Class</th>
                            <th class="py-2 px-4 border border-gray-300">Aggregate</th>
                            <th class="py-2 px-4 border border-gray-300">Science</th>
                            <th class="py-2 px-4 border border-gray-300">Maths</th>
                            <th class="py-2 px-4 border border-gray-300">English</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(range(8, 11) as $class)
                            <tr class="border border-gray-300">
                                <th class="py-2 px-4 border border-gray-300"> {{ $class . 'th' }}</th>
                                <td class="py-2 px-4 border border-gray-300">
                                    <div class="flex">
                                        <select class="flex-shrink-0 border border-gray-300 rounded-l p-2" name="marks_type_{{ $class }}" id="marks_type_{{ $class }}" wire:model="user.marks_type_{{ $class }}">
                                            <option value="">Select</option>
                                            <option value="percentage">Percentage</option>
                                            <option value="grade">Grade</option>
                                        </select>
                                        <input type="text" class="flex-grow border border-gray-300 rounded-r p-2" wire:model="user.marks_aggregate_{{ $class }}" placeholder="Enter Aggregate">
                                    </div>
                                </td>
                                <td class="py-2 px-4 border border-gray-300"><input type="text" class="border border-gray-300 p-2" wire:model="user.marks_science_{{ $class }}" placeholder="Enter Science Grade"></td>
                                <td class="py-2 px-4 border border-gray-300"><input type="text" class="border border-gray-300 p-2" wire:model="user.marks_math_{{ $class }}" placeholder="Enter Math Grade"></td>
                                <td class="py-2 px-4 border border-gray-300"><input type="text" class="border border-gray-300 p-2" wire:model="user.marks_english_{{ $class }}" placeholder="Enter English Grade"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <div class="row m-0 g-5  flex">
            <div class="w-full lg:w-6/12 px-4 form-group {{ $errors->has('user.address') ? 'invalid' : '' }}">
                <label class="form-label" for="address">{{ trans('cruds.user.fields.address') }}</label>
                <textarea class="form-control" name="address" id="address" wire:model.defer="user.address"
                          rows="4"></textarea>
                <div class="validation-message">
                    {{ $errors->first('user.address') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.address_helper') }}
                </div>
            </div>
        </div>
    @endif

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

