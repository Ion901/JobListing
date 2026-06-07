<div style="display:flex; justify-content: space-around; gap:15px;">
    <x-forms.link-action link="{{ route('socialite.redirect', 'google') }}" style="width:100%;">
        <x-forms.button
            style="width:100%; display:inline-flex; justify-content:center; border-radius: 6px; border: 1px solid #abaaaa; background-color: #fdba74; padding: 8px 16px; font-size: 0.875rem; font-weight: 500; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
            <x-icons.google class="text-black" width="30px" height="30px" />
        </x-forms.button>
    </x-forms.link-action>

    <x-forms.link-action link="{{ route('socialite.redirect', 'github') }}" style="width:100%;">
        <x-forms.button
            style="width:100%; display:inline-flex; justify-content:center;border-radius: 6px; border: 1px solid #abaaaa; background-color: #fdba74; padding: 8px 16px; font-size: 0.875rem; font-weight: 500; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
            <x-icons.github width="30px" height="30px" />
        </x-forms.button>
    </x-forms.link-action>
</div>
