UPDATE ct_banner
SET banner_img = REPLACE (banner_img , 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_case_data
SET pdf_file = REPLACE (pdf_file, 'http://en.centerm.com:8091/', 'http://en.centerm.com/');

UPDATE ct_link
SET logo = REPLACE (logo, 'http://en.centerm.com:8091/', 'http://en.centerm.com/');

UPDATE ct_page
SET content = REPLACE (content, 'http://en.centerm.com:8091/', 'http://en.centerm.com/');

UPDATE ct_case
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
thumb = REPLACE (thumb, 'http://en.centerm.com:8091', 'http://en.centerm.com/');


UPDATE ct_download_file
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_download_software
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
thumb = REPLACE (thumb, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_events
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
thumb = REPLACE (thumb, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_news
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
thumb = REPLACE (thumb, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_products
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
thumb = REPLACE (thumb, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_solution
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
thumb = REPLACE (thumb, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_site
SET domain = REPLACE (domain, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_sso_applications
SET url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

UPDATE ct_category
SET image = REPLACE (image, 'http://en.centerm.com:8091', 'http://en.centerm.com/'),
url = REPLACE (url, 'http://en.centerm.com:8091', 'http://en.centerm.com/');

产品图片
case pdf文件

