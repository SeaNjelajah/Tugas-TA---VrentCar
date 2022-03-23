<div class="header pb-6 mb-3" style="background-color: #01D28E;">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">

                <div class="col-12 text-right">
                    @php
                        $addUrl = '';
                        foreach (Request::all() as $key => $value):
                        $addUrl .= $key.'='.$value.'&';
                        endforeach;

                        $addUrl = substr($addUrl,0, count(str_split($addUrl)) - 1);
                    @endphp
                    <a href="{{ route('admin.Persewaan.show') . '?' . $addUrl }} " id="kembali" class="btn btn-sm btn-neutral">Back</a>
                </div>

            </div>

        </div>
    </div>
</div>