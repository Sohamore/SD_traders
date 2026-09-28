import http.server
import socketserver
import urllib.parse
import os
import sys

# Force UTF-8 encoding for stdout on Windows
if sys.platform == "win32":
    try:
        sys.stdout.reconfigure(encoding='utf-8')
    except Exception:
        pass

DEFAULT_PORT = 8000

class SDTradersHandler(http.server.SimpleHTTPRequestHandler):
    def do_POST(self):
        content_length = int(self.headers.get('Content-Length', 0))
        post_data = self.rfile.read(content_length).decode('utf-8')
        params = urllib.parse.parse_qs(post_data)
        
        path = self.path.split('?')[0]
        if path.startswith('/'):
            path = path[1:]
        if not path:
            path = 'index.html'

        if os.path.exists(path):
            with open(path, 'r', encoding='utf-8') as f:
                content = f.read()

            if path == 'order.php':
                name = params.get('name', [''])[0]
                email = params.get('email', [''])[0]
                product = params.get('product', [''])[0]
                quantity = params.get('quantity', [''])[0]

                success_html = f"""
<div class='success'>
    <h2>Order Received!</h2>
    <p>Thank you <b>{name}</b> for your order.</p>
    <p>Product: {product}</p>
    <p>Quantity: {quantity}</p>
    <p>We will contact you at {email}.</p>
</div>
"""
                content = content.replace("<?php\nif ($_SERVER[\"REQUEST_METHOD\"] == \"POST\") {\n    $name = htmlspecialchars($_POST[\"name\"]);\n    $email = htmlspecialchars($_POST[\"email\"]);\n    $product = htmlspecialchars($_POST[\"product\"]);\n    $quantity = htmlspecialchars($_POST[\"quantity\"]);\n\n    echo \"<div class='success'>\";\n    echo \"<h2>Order Received!</h2>\";\n    echo \"<p>Thank you <b>$name</b> for your order.</p>\";\n    echo \"<p>Product: $product</p>\";\n    echo \"<p>Quantity: $quantity</p>\";\n    echo \"<p>We will contact you at $email.</p>\";\n    echo \"</div>\";\n}\n?>", success_html)
                content = content.replace("<?php", "").replace("?>", "")

            elif path == 'feedback.php':
                name = params.get('name', [''])[0]
                rating = params.get('rating', [''])[0]
                message = params.get('message', [''])[0]

                success_html = f"""
<div class='success'>
    <h2>Thank You!</h2>
    <p>Thank you <b>{name}</b> for your feedback.</p>
    <p>Your rating: {rating} / 5</p>
    <p>Your feedback: {message}</p>
</div>
"""
                content = content.replace("<?php", "").replace("?>", "")
                content = content.replace("<section class=\"form-container\">", f"<section class=\"form-container\">\n{success_html}")

            elif path == 'reviews.php':
                name = params.get('name', [''])[0]
                rating = params.get('rating', [''])[0]
                message = params.get('message', [''])[0]

                content = f"""
<div class='success'>
    <h2>Review Submitted!</h2>
    <p>Thank you <b>{name}</b> for sharing your review.</p>
    <p>Your rating: {rating} / 5</p>
    <p>Your review: {message}</p>
</div>
<p><a href='reviews.html'>Return to reviews</a></p>
"""

            self.send_response(200)
            self.send_header("Content-type", "text/html; charset=utf-8")
            self.end_headers()
            self.wfile.write(content.encode('utf-8'))
        else:
            self.send_error(404, "File Not Found")

    def do_GET(self):
        path = self.path.split('?')[0]
        if path.startswith('/'):
            path = path[1:]
        if not path or path == '':
            self.path = '/index.html'

        # If requesting .php file via GET, serve it clean as HTML
        if path in ['order.php', 'feedback.php', 'contact.php', 'reviews.php'] and os.path.exists(path):
            with open(path, 'r', encoding='utf-8') as f:
                content = f.read()
            lines = content.splitlines()
            clean_lines = []
            in_php = False
            for line in lines:
                if '<?php' in line:
                    in_php = True
                    continue
                if '?>' in line:
                    in_php = False
                    continue
                if not in_php:
                    clean_lines.append(line)
            clean_content = '\n'.join(clean_lines)

            self.send_response(200)
            self.send_header("Content-type", "text/html; charset=utf-8")
            self.end_headers()
            self.wfile.write(clean_content.encode('utf-8'))
            return

        return super().do_GET()

def run_server():
    socketserver.TCPServer.allow_reuse_address = True
    port = DEFAULT_PORT
    for offset in range(10):
        current_port = port + offset
        try:
            with socketserver.TCPServer(("127.0.0.1", current_port), SDTradersHandler) as httpd:
                print(f"\n🚀 SD Traders Dev Server is live!")
                print(f"👉 Local URL:   http://127.0.0.1:{current_port}")
                print(f"👉 Alt URL:     http://localhost:{current_port}")
                print("Press Ctrl+C to stop the server.\n", flush=True)
                httpd.serve_forever()
                break
        except OSError as e:
            if getattr(e, 'winerror', None) == 10048 or getattr(e, 'errno', None) in (98, 10048):
                if offset == 0:
                    print(f"Port {current_port} is already in use. Trying port {current_port + 1}...", flush=True)
                continue
            else:
                raise e

if __name__ == "__main__":
    run_server()
