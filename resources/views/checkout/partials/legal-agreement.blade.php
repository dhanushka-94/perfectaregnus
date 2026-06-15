<div class="card-elevated p-5 sm:p-8">
    <h2 class="font-display text-lg sm:text-xl font-semibold text-ink mb-4 sm:mb-6">Legal Agreement</h2>
    <p class="text-xs sm:text-sm text-muted mb-4 sm:mb-5 leading-relaxed">
        Please review and accept the following before placing your order. Links open in a new tab.
    </p>
    <div class="space-y-4">
        <label class="checkbox-field @error('agree_privacy') checkbox-field--error @enderror">
            <input type="checkbox"
                name="agree_privacy"
                id="agree_privacy"
                value="1"
                class="checkbox-input"
                @checked(old('agree_privacy'))
                required>
            <span class="checkbox-box" aria-hidden="true"></span>
            <span class="checkbox-label">
                I have read and agree to the
                <a href="{{ route('privacy') }}" target="_blank" rel="noopener noreferrer" class="text-gold-dark hover:text-ink underline underline-offset-2">Privacy Policy</a>
                <span class="text-gold-dark">*</span>
            </span>
        </label>
        @error('agree_privacy')
            <p class="text-red-600 text-xs -mt-2">{{ $message }}</p>
        @enderror

        <label class="checkbox-field @error('agree_terms') checkbox-field--error @enderror">
            <input type="checkbox"
                name="agree_terms"
                id="agree_terms"
                value="1"
                class="checkbox-input"
                @checked(old('agree_terms'))
                required>
            <span class="checkbox-box" aria-hidden="true"></span>
            <span class="checkbox-label">
                I have read and agree to the
                <a href="{{ route('terms') }}" target="_blank" rel="noopener noreferrer" class="text-gold-dark hover:text-ink underline underline-offset-2">Terms &amp; Conditions</a>
                <span class="text-gold-dark">*</span>
            </span>
        </label>
        @error('agree_terms')
            <p class="text-red-600 text-xs -mt-2">{{ $message }}</p>
        @enderror
    </div>
</div>
