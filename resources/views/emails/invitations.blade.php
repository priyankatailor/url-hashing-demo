@component('mail::message')
# Introduction

Below link is short link of  entered url with utm source or any other query parameters it can be used only once.

@component('mail::button', ['url' => $data['link']])
Click Here
@endcomponent

Thanks,<br>
John
@endcomponent
