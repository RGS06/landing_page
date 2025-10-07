# SODE Landing Page (WordPress Page Template)

A mobile-friendly, responsive landing page for “SODE Group of Institutions”. Built as a WordPress page template with inline HTML, CSS, and JS. Includes seven institution tiles that link to their respective pages.

## Features
- Responsive grid: 1 column on mobile, 2–3 on larger screens
- 7 clickable cards with hover lift/shadow and smooth animation
- Branding colors:
  - Kumkum: #7B1436
  - Chandan: #C59048
  - Neel: #122147
- Light neutral background with subtle Neel + Kumkum gradient overlay
- Clean typography (Poppins/Inter fallback to system sans-serif)

## Usage
1. Copy `sode-landing-page.php` into your active theme directory (e.g., `wp-content/themes/your-theme/`).
2. In WordPress Admin, create a new Page and select the template “SODE Landing Page” from the Page Attributes/Template dropdown.
3. Publish the page.

## Customization
- Update the `$institutions` array near the top of `sode-landing-page.php` with real names, taglines, and URLs.
- The logo at the top points to:
  https://sode-edu.in/wp-content/uploads/2025/10/sode_logo.webp
  If this path changes, update the `<img>` `src` attribute accordingly.
- Adjust colors or spacing by editing CSS variables at the top of the inline `<style>` block.

## Notes
- This template calls `get_header()` and `get_footer()` to respect your theme’s structure. Styles and scripts are inline to keep it self-contained.
- If Google Fonts are blocked by CSP, the template falls back to system fonts.

## License
This project is provided as-is. You may adapt it for your site’s needs.
