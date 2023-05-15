@extends('master')
@section('content')

<main>
    <div class="content-add-device">
        <div class="title-heading">
            <p>Danh sách vai trò</p>
        </div>

        <div class="area-form-add-role">
            <p class="infomation-device">Thông tin vai trò</p>
            <form id="form-add-role"
                action="{{ !isset($role) ? route('role.store') : route('role.update', ['id' => $role->id]) }}"
                method="POST">
                @csrf
                @if(isset($role))
                @method('PUT')
                @endif
                <div class="form-add-role">
                    <div>
                        <div class="item-form-add-role">
                            <label for="name">Tên vai trò: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                        fill="#FF4747" />
                                </svg>
                                @if($errors->has('name'))
                                <div class="alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </label>
                            <input name="name" type="text" placeholder="Nhập tên vai trò"
                                value="{{ isset($role->name) ? $role->name : '' }}" class="form-control @error('name') is-invalid @enderror">
                        </div>
                        <div class="item-form-add-role">
                            <label for="description">Mô tả:
                                @if($errors->has('description'))
                                <div class="alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </label>
                            <textarea name="description" id=""
                                placeholder="Nhập mô tả">{{ isset($role->description) ? $role->description : '' }}</textarea>
                        </div>

                        <span class="note-form-add-device">
                            <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                    fill="#FF4747" />
                            </svg>
                            Là trường thông tin bắt buộc
                        </span>

                    </div>
                    <div class="area-form-right-role">

                        <label for="permissions">Phân quyền chức năng<svg style="margin-left: 4px;" width="6" height="6"
                                viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                    fill="#FF4747" />
                            </svg>
                            @if($errors->has('permissions'))
                            <div class="alert-danger">{{ $errors->first('permissions') }}</div>
                            @endif
                        </label>

                        <div class="area-decentra">
                            <div class="item-decentra">
                                <h2>Nhóm chức năng A</h2>
                                <ul>
                                    <li class="li-item-decentra">
                                        <input type="checkbox" name="permissions[]" value="all"
                                            onchange="checkAll(this)"
                                            {{ isset($role) ? Str::contains($role->permissions, 'all') ? 'checked' : '' : ''}}>
                                        Tất cả
                                    </li>
                                    <li class="li-item-decentra"><input type="checkbox" name="permissions[]" value="x"
                                            onchange="uncheckAll(this)"
                                            {{ isset($role) ? Str::contains($role->permissions, 'x') ? 'checked' : '' : ''}}>
                                        Chức năng x</li>
                                    <li class="li-item-decentra"><input type="checkbox" name="permissions[]" value="y"
                                            onchange="uncheckAll(this)"
                                            {{ isset($role) ? Str::contains($role->permissions, 'y') ? 'checked' : '' : ''}}>
                                        Chức năng y</li>
                                    <li class="li-item-decentra"><input type="checkbox" name="permissions[]" value="z"
                                            onchange="uncheckAll(this)"
                                            {{ isset($role) ? Str::contains($role->permissions, 'z') ? 'checked' : '' : ''}}>
                                        Chức năng z</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="area-button-add_device">
            <a href="/role">
                <button class="btn-add-device-abort" type="button">Hủy bỏ</button>
            </a>
            @if(isset($role) && isset($role->id))
            <button form="form-add-role" class="btn-add-device-add" type="submit">Cập nhật</button>
            @else
            <button form="form-add-role" class="btn-add-device-add" type="submit">Thêm</button>
            @endif
        </div>
    </div>
</main>
@endsection