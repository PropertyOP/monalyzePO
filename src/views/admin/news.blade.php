    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <div class="col-lg-4">
                    <div class="btn-group">
                        <a id="b-add" class="btn green" href="/panel/admin/news/update" data-target="#ajax" data-toggle="modal">
                            @lang('mposuccess::panel.add') <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="table_news">
                    <thead>
                    <tr>
                        <th>
                            @lang('mposuccess::panel.news.name')
                        </th>
                        <th>
                            @lang('mposuccess::panel.news.preview')
                        </th>
                        <th>
                            @lang('mposuccess::panel.news.type.added')
                        </th>
                        <th>
                            @lang('mposuccess::panel.news.type.edited')
                        </th>
                        <th>
                            @lang('mposuccess::panel.news.type.title')
                        </th>
                        <th>
                            @lang('mposuccess::panel.news.status.title')
                        </th>
                        <th>
                            @lang('mposuccess::panel.news.img')
                        </th>
                        <th>
                            @lang('mposuccess::panel.tools')
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($news as $item)
                            <tr class="odd gradeX">
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ substr(strip_tags($item->preview), 0, 100) }}
                                </td>
                                <td class="center" align="center">
                                    {{ date_format(date_create($item->created_at), 'd M Y H:i:s') }}
                                </td>
                                <td class="center" align="center">
                                    {{ date_format(date_create($item->updated_at), 'd M Y H:i:s') }}
                                </td>
                                <td align="center">
                                    @if($item->type == config('mposuccess.news_type_private'))
                                        <span class="label label-sm label-danger">
                                            @lang('mposuccess::panel.news.type.private') </span>
                                    @elseif($item->type == config('mposuccess.news_type_company'))
                                        <span class="label label-sm label-info">
                                            @lang('mposuccess::panel.news.type.company') </span>
                                    @elseif($item->type == config('mposuccess.news_type_world'))
                                        <span class="label label-sm label-warning">
                                            @lang('mposuccess::panel.news.type.world') </span>
                                    @else
                                        <span class="label label-sm label-default">
                                            @lang('mposuccess::panel.news.type.unknown') </span>
                                    @endif
                                </td>
                                <td align="center">
                                    @if($item->display)
                                        <span class="label label-sm label-success">
                                            @lang('mposuccess::panel.news.status.displayed') </span>
                                    @else
                                        <span class="label label-sm label-warning">
                                            @lang('mposuccess::panel.news.status.hidden') </span>
                                    @endif
                                </td>
                                <td align="center">
                                    <div class="thumbnail" style="width: 100px; height: 70px;">
                                        <img src="{{ $item->img ? config('mposuccess.news_storage_img') . $item->img : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' }}" alt="">
                                    </div>
                                </td>
                                <td align="center">
                                    <a href="/panel/admin/news/update/{{$item->id}}" class="btn default btn-xs purple b-edit" data-target="#ajax" data-toggle="modal">
                                        <i class="fa fa-edit"></i> @lang('mposuccess::panel.edit') </a>
                                    <a href="javascript:;" class="btn default btn-xs black b-delete" data-id-news="{{$item->id}}">
                                        <i class="fa fa-trash-o"></i> @lang('mposuccess::panel.delete') </a>
                                    <a href="/panel/admin/news/post/{{$item->id}}" target="_blank" class="btn default btn-xs blue-stripe" data-id-news="{{$item->id}}">
                                        @lang('mposuccess::panel.view') </a>
                                    <a href="javascript:;" style="display: none" class="loading-delete">
                                        <img src="/images/pages/loading-spinner-grey.gif" alt="" class="loading">
                                        <span>&nbsp;&nbsp;@lang('mposuccess::panel.loading')... </span></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajax" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg"></div>
    </div>


    <script>

       var messages = [];
       messages['statusDisplayed'] = "@lang('mposuccess::panel.news.status.displayed')";
       messages['statusHidden'] = "@lang('mposuccess::panel.news.status.hidden')";
       messages['typePrivate'] = "@lang('mposuccess::panel.news.type.private')";
       messages['typePrivateValue'] = "<?=config('mposuccess.news_type_private')?>";
       messages['typeCompany'] = "@lang('mposuccess::panel.news.type.company')";
       messages['typeCompanyValue'] = "<?=config('mposuccess.news_type_company')?>";
       messages['typeWorld'] = "@lang('mposuccess::panel.news.type.world')";
       messages['typeWorldValue'] = "<?=config('mposuccess.news_type_world')?>";

       messages['loading'] = "@lang('mposuccess::panel.loading')";

    </script>