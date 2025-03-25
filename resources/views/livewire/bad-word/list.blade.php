<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">{{__('menu.bad-words')}}</h4>
                </div>
                <div>
                    <button wire:click="openBadWordAddModal" class="btn btn-primary">
                        {{__('datatable.add')}}
                    </button>
                    <button wire:click="refresh" class="btn btn-success">
                        {{__('datatable.refresh')}}
                    </button>
                </div>

            </div>

            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead >
                        <tr >
                            <th class="border-1">{{__('datatable.type')}}</th>
                            <th class="border-1">{{__('datatable.word')}}</th>
                            <th class="border-1">{{__('datatable.match')}}</th>
                            <th class="border-1">{{__('datatable.action')}}</th>
                        </tr>
                        </thead>

                        <tbody id="device-table-body">
                        @foreach($badWords as $badWord)

                            <tr >
                                <td class="border-1">
                                    @php
                                        switch ($badWord->priority){
                                            case "low":
                                                $type_color = "success";
                                                break;
                                            case "medium":
                                                $type_color = "info";
                                                break;
                                            case "high":
                                                $type_color = "warning";
                                                break;
                                            case "critical":
                                                $type_color = "danger";
                                                break;
                                        }
                                    @endphp
                                    <div class="d-flex align-items-center">
                                        <h6 class="text-{{$type_color}}">{{strtoupper(__('general.'.$badWord->priority))}}</h6>
                                    </div>
                                </td >
                                <td class="border-1">
                                    <div class="d-flex flex-wrap align-items-start">
                                        <h6>{{$badWord->word}}</h6>
                                    </div>
                                </td >
                                <td class="border-1">
                                    <div class="text-start" style="word-wrap: break-word; white-space: normal;">

                                        @foreach(explode(",", trim($badWord->match, "{}")) as $match)
                                            <span class="badge rounded-pill bg-soft-primary px-3 py-2" style="font-size: 0.8rem;">{{$match}}</span>
                                        @endforeach
                                    </div>

                                </td >
                                <td class="border-1">

                                    <button wire:click="openBadWordEditModal({{$badWord->id}})" type="button" class="btn btn-sm btn-soft-primary">
                                        <span>{{__('datatable.edit')}}</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </span>
                                    </button>
                                    <button wire:click="openBadWordDeleteModal({{$badWord->id}})" type="button" class="btn btn-sm btn-soft-danger">
                                        <span>{{__('datatable.delete')}}</span>
                                        <span>
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

