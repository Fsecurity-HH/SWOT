<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Web Osint Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: black; /* Серый фон */
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .container {
            max-width: 500px;
            margin: 0 20px;
            padding: 20px;
            background-color: grey; 
            border: 2px solid white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 60px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: white;
            text-align: center;
        }
        input[type="text"] {
            width: calc(100% - 20px); /* Смещение влево на 20px */
            padding: 8px;
            box-sizing: border-box;
            margin-left: 10px;
            font-size: 15px;
            text-align: center;
        }
        button {
            padding: 10px 15px;
            background-color: #902537;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #960018;
            border-radius: 10px;
        }
        .results {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            position: relative;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-all;
            hyphens: auto;
        }
        .copy-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: #902537;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .copy-button:hover {
            background-color: #902537;
            border-radius: 10px;
        }
        .card {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            box-sizing: border-box;
            position: relative;
        }
        .card h2 {
            margin-bottom: 15px;
            color: white;
            text-align: center;
        }
        .buttons-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .what-button {
            background-color: #902537;
        }
        .what-button:hover {
            background-color: #902537;
        }
        .nslookup-button {
            background-color: #902537;
        }
        .nslookup-button:hover {
            background-color: #902537;
        }
        .wayback-button {
            background-color: #902537;
        }
        .wayback-button:hover {
            background-color: #902537;
        }
        
        .hr{
        
        }
        
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 style="color:black;" >IP LookUP and subdomain Scan</h2>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label style="color:black;" for="nslookup_domain">Enter Domain:</label>
                    <input type="text" id="nslookup_domain" name="nslookup_domain" placeholder="example.com" required>
                </div>
                <div class="buttons-container">
                    <button type="submit" name="nslookup_scan" class="nslookup-button">Start Scan</button>
                </div>
            </form>

           
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nslookup_scan'])): ?>
                <div class="results" id="results">
                    <button class="copy-button" onclick="copyToClipboard()">Copy to Clipboard</button>
                    <h2 style="color:black;" >IP LookUP and subdomains Results:</h2>
                    <?php
                    
$subdomains = [
    "ftp", "ssh", "mail", "www", "api", "dev", "test", "blog", "cms", "cdn", "db", "admin", "backup", "beta", "demo", "docs", "download", "forum", "help", "intranet", "jobs", "lab", "live", "login", "m", "mobile", "monitor", "news", "old", "partner", "pay", "payment", "portal", "preview", "prod", "production", "qa", "secure", "shop", "site", "staging", "static", "status", "support", "survey", "sys", "test2", "training", "uat", "upload", "user", "vpn", "web", "wiki", "wp", "www2", "www3", "www4", "archive", "assets", "auth", "billing", "cache", "calendar", "client", "cloud", "console", "content", "crm", "data", "database", "developer", "direct", "dns", "email", "files", "git", "host", "image", "images", "inbox", "info", "internal", "irc", "labs", "lists", "local", "log", "logs", "media", "metrics", "mirror", "network", "office", "online", "order", "panel", "photo", "photos", "podcast", "pop", "pop3", "private", "proxy", "public", "remote", "report", "res", "resource", "rss", "sandbox", "search", "secure2", "service", "smtp", "sso", "store", "stream", "subdomain", "sync", "system", "team", "temp", "tmp", "tracker", "updates", "video", "vps", "webmail", "widget", "app", "chat", "clientarea", "cloudfront", "community", "control", "customer", "dashboard", "developers", "discuss", "documentation", "downloads", "en", "es", "eu", "forums", "gateway", "github", "gitlab", "graph", "graphs", "groups", "home", "kb", "knowledgebase", "learn", "legal", "license", "licenses", "logout", "mail2", "mail3", "mail4", "mail5", "manager", "marketing", "members", "messages", "my", "newsletter", "newsletters", "orders", "org", "organizations", "password", "payments", "people", "press", "product", "products", "profile", "profiles", "project", "projects", "promo", "purchase", "purchases", "register", "registration", "reports", "rest", "restapi", "review", "reviews", "sales", "security", "services", "settings", "shopping", "sign", "signin", "signout", "signup", "sitemap", "ssl", "stage", "technology", "testing", "tickets", "tools", "trial", "try", "users", "videos", "view", "views", "wordpress", "work", "works", "worksheets", "xml", "xmpp", "xhr", "yaml", "yml", "you", "your", "youtube", "zabbix", "zen", "zip", "zoom", "zoho", "zscaler", "zimbra", "account", "administer", "affiliate", "alpha", "analytics", "appstore", "apps", "application", "applications", "art", "article", "articles", "asana", "authentication", "authorize", "backend", "bill", "board", "boards", "careers", "catalog", "checkout", "clients", "code", "coding", "company", "config", "configuration", "connect", "contact", "contacts", "core", "doc", "dropbox", "event", "events", "facebook", "faq", "faqs", "feed", "feeds", "file", "finance", "find", "finder", "firewall", "free", "frontend", "gallery", "games", "get", "google", "graphics", "guide", "guides", "hr", "hub", "humanresources", "idea", "ideas", "import", "information", "insights", "instagram", "internet", "io", "issue", "issues", "it", "job", "join", "journal", "journals", "knowledge", "language", "languages", "learning", "library", "libraries", "life", "link", "links", "list", "location", "locations", "maintenance", "map", "maps", "market", "markets", "member", "metrics", "messenger", "method", "methods", "model", "models", "module", "modules", "motion", "move", "music", "note", "notes", "notification", "notifications", "oauth", "offer", "offers", "open", "opensource", "organization", "outlook", "page", "pages", "place", "places", "platform", "plugin", "plugins", "poll", "polls", "post", "posts", "privacy", "promotions", "proof", "proofs", "pulse", "qa", "question", "questions", "quiz", "quizzes", "radio", "read", "reader", "reading", "release", "releases", "roadmap", "room", "rooms", "schedule", "school", "science", "sdk", "session", "sessions", "share", "sharepoint", "shopping", "show", "shows", "site", "sites", "skill", "skills", "slack", "slide", "slides", "solution", "solutions", "source", "sources", "space", "spaces", "spec", "specs", "speed", "speedtest", "spreadsheets", "start", "stories", "story", "sync", "table", "tables", "talk", "talking", "task", "tasks", "team", "teams", "template", "templates", "thread", "threads", "time", "timeline", "tool", "topic", "topics", "track", "tracking", "train", "translate", "translation", "tree", "trees", "trello", "tweet", "tweets", "twitter", "update", "upload", "uploads", "voice", "volume", "vote", "votes", "watch", "watches", "webinar", "webinars", "welcome", "widgets", "win", "windows", "wireframe", "wireframes", "workbench", "workflow", "workflows", "workspace", "workspaces", "write", "writes", "writer", "writers", "xbox", "xcode", "xerox", "xpath", "xray", "xtreme", "youtubers", "zone", "zones", "zoo", "zoos", "zurich", "zzz"
];
                    $results = [];
                    $domain = $_POST["nslookup_domain"];
                    foreach ($subdomains as $sub) {
                        $fullDomain = $sub . '.' . $domain;
                        try {
                            
                            $output = shell_exec("nslookup -query=ALL " . escapeshellarg($fullDomain));
                            
                            if (strpos($output, "NXDOMAIN") === false && strpos($output, "SERVFAIL") === false) {
                               
                                $filteredOutput = filterNslookupOutput($output);
                                if (!empty(trim($filteredOutput))) {
                                    $results[] = "<b>$fullDomain найден:</b><br><pre>" . htmlspecialchars($filteredOutput) . "</pre>";
                                }
                            }
                           
                        } catch (Exception $e) {
                            
                        }
                    }
                    
                    if (!empty($results)) {
                        echo implode("<br><br>", $results);
                    } else {
                        echo "<p>Ничего не найдено.</p>";
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

   
    <div class="container">
        <div class="card">
            <h2 style="color:black;" >WhatWeb Scan</h2>
           
            <form method="POST" action="">
                <div class="form-group">
                    <label style="color:black;" for="whatweb_domain">Enter Domain:</label>
                    <input type="text" id="whatweb_domain" name="whatweb_domain" placeholder="example.com" required>
                </div>
                <div class="buttons-container">
                    <button type="submit" name="whatweb_scan" class="what-button">Start Scan</button>
                </div>
            </form>

            
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['whatweb_scan'])): ?>
                <div class="results" id="whatweb_results">
                    <button class="copy-button" onclick="copyWhatwebResults()">Copy to Clipboard</button>
                    <h2 style="color:black;" >WhatWeb Results:</h2>
                    <?php
                    $whatweb_domain = $_POST["whatweb_domain"];
                    try {
                       
                        $output = shell_exec("whatweb " . escapeshellarg($whatweb_domain));
                        if (!empty(trim($output))) {
                            echo "<pre style='white-space: pre-wrap;'>" . htmlspecialchars($output) . "</pre>";
                        } else {
                            echo "<p>Ничего не найдено.</p>";
                        }
                    } catch (Exception $e) {
                       
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="container">
        <div class="card">
            <h2 style="color:black;" >WaybackUrls Scan</h2>
           
            <form method="POST" action="">
                <div class="form-group">
                    <label style="color:black;" for="wayback_domain">Enter Domain:</label>
                    <input type="text" id="wayback_domain" name="wayback_domain" placeholder="https://example.com" required>
                </div>
                <div class="buttons-container">
                    <button type="submit" name="wayback_scan" class="wayback-button">Start Scan</button>
                </div>
            </form>

           
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['wayback_scan'])): ?>
                <div class="results" id="wayback_results">
                    <button class="copy-button" onclick="copyWaybackResults()">Copy to Clipboard</button>
                    <h2 style="color:black;" >WaybackUrls Results:</h2>
                    <?php
                    $wayback_domain = $_POST["wayback_domain"];
                    try {
                        
                        $output = shell_exec("echo " . escapeshellarg($wayback_domain) . " | waybackurls | gf xss");
                        if (!empty(trim($output))) {
                            echo "<pre style='white-space: pre-wrap;'>" . htmlspecialchars($output) . "</pre>";
                        } else {
                            echo "<p>Ничего не найдено.</p>";
                        }
                    } catch (Exception $e) {
                        
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    
    
<div class="container">
    <div class="card">
        <h2 style="color:black;" >Directory Check</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label style="color:black;" for="directory_domain">Enter Domain:</label>
                <input type="text" id="directory_domain" name="directory_domain" placeholder="https://example.com" required>
            </div>
            <div class="buttons-container">
                <button type="submit" name="directory_check" class="directory-button">Start Scan</button>
            </div>
        </form>
       
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['directory_check'])): ?>
            <div class="results" id="directory_results">
                <button class="copy-button" onclick="copyDirectoryResults()">Copy to Clipboard</button>
                <h2 style="color:black;" >Directory Check Results:</h2>
                <?php
                
                $subdirectories = [
                    "/sub",
                    "/payment",
                    "/price",
                    "/about",
                    "/contact",
                    "/blog",
                    "/shop",
                    "/cart",
                    "/checkout",
                    "/login",
                    "/register",
                    "/robots.txt",
                    "/admin",
    "/admin.php",
    "/administrator",
    "/administrator.php",
    "/admin/login",
    "/admin/dashboard",
    "/admin/settings",
    "/admin/users",
    "/admin/panel",
    "/admin_area",
    "/admin_console",
    "/admin_login",
    "/dashboard",
    "/control",
    "/controlpanel",
    "/cpanel",
    "/moderator",
    "/root",
    "/superadmin",
    "/system",
    "/system_admin",
    "/secure",
    "/secure_admin",
    "/manage",
    "/management",
    "/login",
    "/login.php",
    "/auth",
    "/auth.php",
    "/signin",
    "/signup",
    "/register",
    "/logout",
    "/password_reset",
    "/forgot-password",
    "/account",
    "/accounts",
    "/user",
    "/users",
    "/profile",
    "/members",
    "/clients",
    "/customer",
    "/customers",
    "/config",
    "/config.php",
    "/config.inc.php",
    "/configuration.php",
    "/.env",
    "/settings",
    "/setup",
    "/setup.php",
    "/install",
    "/install.php",
    "/upgrade",
    "/update",
    "/database",
    "/database.php",
    "/db",
    "/dbadmin",
    "/dbadmin.php",
    "/phpmyadmin",
    "/phpmyadmin.php",
    "/mysql",
    "/mysql.php",
    "/sql",
    "/sql.php",
    "/db_backup",
    "/backup",
    "/backup.sql",
    "/dump.sql",
    "/wp-admin",
    "/wp-login.php",
    "/wp-content",
    "/wp-includes",
    "/wp-config.php",
    "/wp-json",
    "/wp-cron.php",
    "/wp-uploads",
    "/joomla",
    "/joomla-admin",
    "/drupal",
    "/magento",
    "/prestashop",
    "/logs",
    "/logs.php",
    "/log",
    "/error",
    "/error.php",
    "/errors",
    "/debug",
    "/debug.php",
    "/server-status",
    "/server-info",
    "/crash",
    "/stacktrace",
    "/cgi-bin",
    "/cgi-bin/test.cgi",
    "/cgi-bin/admin.cgi",
    "/cgi-bin/login.cgi",
    "/shell",
    "/shell.php",
    "/cmd",
    "/cmd.php",
    "/console",
    "/console.php",
    "/terminal",
    "/bash",
    "/bash.php",
    "/sh",
    "/sh.php",
    "/old",
    "/old_site",
    "/backup_old",
    "/backups",
    "/bak",
    "/bak.php",
    "/site_old",
    "/archive",
    "/archives",
    "/admin_old",
    "/admin_bak",
    "/db_old",
    "/database_old",
    "/config_old",
    "/api",
    "/api.php",
    "/graphql",
    "/graphql.php",
    "/mail",
    "/mail.php",
    "/webmail",
    "/email",
    "/newsletter",
    "/subscribe",
    "/unsubscribe",
    "/sms",
    "/webhook",
    "/json",
    "/xml",
    "/shop",
    "/store",
    "/cart",
    "/checkout",
    "/payment",
    "/pay",
    "/order",
    "/orders",
    "/invoice",
    "/billing",
    "/shipping",
    "/track",
    "/tracking",
    "/uploads",
    "/upload",
    "/files",
    "/file",
    "/documents",
    "/docs",
    "/downloads",
    "/download",
    "/gallery",
    "/images",
    "/img",
    "/media",
    "/music",
    "/videos",
    "/video",
    "/audio",
    "/static",
    "/assets",
    "/css",
    "/js",
    "/fonts",
    "/themes",
    "/templates",
    "/vendor",
    "/modules",
    "/components",
    "/includes",
    "/lib",
    "/libs",
    "/source",
    "/sources",
    "/robots.txt",
    "/sitemap.xml",
    "/ads.txt",
    "/humans.txt",
    "/security.txt",
    "/privacy-policy",
    "/terms",
    "/terms-of-service",
    "/tos",
    "/legal",
    "/license",
    "/cookies",
    "/index.php",
    "/index.html",
    "/home",
    "/about",
    "/about-us",
    "/contact",
    "/contact-us",
    "/support",
    "/help",
    "/faq",
    "/blog",
    "/news",
    "/rss",
    "/press",
    "/events",
    "/private",
    "/restricted",
    "/confidential",
    "/hidden",
    "/secret",
    "/vault",
    "/keys",
    "/key",
    "/security",
    "/security_check",
    "/admin_secret",
    "/beta",
    "/test",
    "/staging",
    "/demo",
    "/status",
    "/status.php",
    "/health",
    "/monitoring",
    "/ping",
    "/diagnostics",
     
 ];

                
                function checkDirectory($domain, $directory) {
                    $url = $domain . $directory;
                    $headers = @get_headers($url);

                    if ($headers && strpos($headers[0], '200') !== false) {
                        return true;
                    } else {
                        return false;
                    }
                }

                
                $domain = $_POST['directory_domain'];

                echo "<h2>Checking directories on {$domain}</h2>";

                
                foreach ($subdirectories as $directory) {
                    $exists = checkDirectory($domain, $directory);
                    if ($exists) {
                        echo "<p><strong>{$directory}</strong> &nbsp;| найдено </p>";
                    } else {
                        
                    }
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
    
    
    
    <div class="container">
    <div class="card">
        <h2 style="color:black;">Port Scan</h2>
       
        <form method="POST" action="">
            <div class="form-group">
                <label style="color:black;" for="nmap_host">Enter Host:</label>
                <input type="text" id="nmap_host" name="nmap_host" placeholder="example.com or IP address" required>
            </div>
            <div class="buttons-container">
                <button type="submit" name="nmap_scan" class="nmap-button">Start Scan</button>
            </div>
        </form>
      
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nmap_scan'])): ?>
            <div class="results" id="nmap_results">
                <button class="copy-button" onclick="copyNmapResults()">Copy to Clipboard</button>
                <h2 style="color:black;" >Nmap Results:</h2>
                <?php
                
                $host = escapeshellarg($_POST['nmap_host']); 

                echo "<h2>Scanning host: {$host}</h2>";

               
                $nmap_path = shell_exec('which nmap');
                if (empty(trim($nmap_path))) {
                    echo "<p>Error: Nmap is not installed or not accessible.</p>";
                } else {
                   
                    $command = "nmap -sV -A -Pn {$host} 2>&1"; 
                    $output = shell_exec($command);

                    if ($output) {
                        echo "<pre>" . htmlspecialchars($output) . "</pre>";
                    } else {
                        echo "<p>Error: Unable to execute Nmap or no results found.</p>";
                    }

                   
                    error_log("Command executed: $command");
                    error_log("Output: $output");
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>

    
    
    <script>
        function copyToClipboard() {
            const resultsElement = document.getElementById('results');
            const range = document.createRange();
            range.selectNode(resultsElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('Results copied to clipboard!');
        }

        function copyWhatwebResults() {
            const whatwebResultsElement = document.getElementById('whatweb_results');
            const range = document.createRange();
            range.selectNode(whatwebResultsElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('WhatWeb results copied to clipboard!');
        }

        function copyWaybackResults() {
            const waybackResultsElement = document.getElementById('wayback_results');
            const range = document.createRange();
            range.selectNode(waybackResultsElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('WaybackUrls results copied to clipboard!');
        }
        
            function copyDirectoryResults() {
        var results = document.getElementById('directory_results').innerText;
        navigator.clipboard.writeText(results).then(function() {
        }, function(err) {
            console.error('Не удалось скопировать текст: ', err);
        });
    }
    
        function copyNmapResults() {
        var results = document.getElementById('nmap_results').innerText;
        navigator.clipboard.writeText(results).then(function() {
        }, function(err) {
            console.error('Не удалось скопировать текст: ', err);
        });
    }
        
    </script>
</body>
</html>

<?php

function filterNslookupOutput($output) {
   
    $removeLines = [
        'unknown query type: ALL',
        'Server:',
        'Non-authoritative answer:'
    ];
   
    $lines = explode("\n", $output);
   
    $filteredLines = array_filter($lines, function($line) use ($removeLines) {
        foreach ($removeLines as $removeLine) {
            if (strpos($line, $removeLine) !== false) {
                return false;
            }
        }
        return true;
    });

    return trim(implode("\n", $filteredLines));
}
?>
