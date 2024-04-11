import plivo

proxies = {
    'http': 'https://username:password@proxyurl:proxyport',
    'https': 'https://username:password@proxyurl:proxyport'
    }
client = plivo.RestClient('<auth_id>', '<auth_token>', proxies=proxies,timeout=5)