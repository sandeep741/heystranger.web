@extends('beautymail::templates.minty')

@section('content')

@include('beautymail::templates.minty.contentStart')
<tr>
    <td class="title">
        Welcome Dear
    </td>
</tr>
<tr>
    <td width="100%" height="10"></td>
</tr>
<tr>
    <td class="paragraph">
        Dear Partner
        Congratulations, you’ve completed your first step.
        We want you, our partner to feel You Are part of a system that delivers value for money. .
        We do ask a small registration fee on Commission sign up to ensure we can give you the best service to connect you to your customers.
        With trained booking agents to assist you and your clients.
        Our goal is to offer many benefits such as: Online Customer Service, Social Media and interaction, Bookmark options, Variety of affordable a
        of Attraction in surroundings to keep customers stay longer.
        This is a small investment with a huge return as we guarantee you more business. We operate on both Annual and commission basis so when
        We Welcome You!!!
        Sign up today and begin your journey with us.
        Open the link below and start to manage your listings
        {!! url('register') !!}
        Very important to have link in
        email to de-direct to sign in page
        Hey Stranger: Online Service Provider for the travel industry.
        This is a great privilege inviting you to become a partner with Hey Stranger.
        Getting listed with Us will get you more business; boost your sales, increase excellent exposure, saving you time and money and keep
        promotions
        Reach millions of customers all around the world by adding your listing on our website
        Don’t pay thousands to advertise. With us you will save money.
        Let us do the advertising for you, 24 hours a day, 7 days a week, 365 days a year
        We strive to provide Client Services for the Client by the Clients
        Kind Regards
        Hey Stranger Team
        {!! url('') !!}
    </td>
</tr>
<tr>
    <td width="100%" height="25"></td>
</tr>
<tr>
    <td class="title">
        Thanks & regards
    </td>
</tr>
<tr>
    <td width="100%" height="10"></td>
</tr>
<tr>
    <td class="paragraph">
        Hey Stranger
    </td>
</tr>
<tr>
    <td width="100%" height="25"></td>
</tr>
<tr>
    <td>
        @include('beautymail::templates.minty.button', ['text' => 'Sign in', 'link' => 'http://heystranger.local/register'])
    </td>
</tr>
<tr>
    <td width="100%" height="25"></td>
</tr>
@include('beautymail::templates.minty.contentEnd')

@stop